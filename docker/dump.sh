#!/bin/bash

# Чтобы получить бэкап зайдите в панель управления minio
# бакет: backups
# Папка: план бэкапа сайта (в большенстве случаем название домена)
# Создайте Share ссылку для скачивания файла
# Запустите скрипт dump.sh и вставьте ссылку на бэкап

echo "Add link from backup files minio backups:"
read LINK_DOWNLOAD

if [[ -z $LINK_DOWNLOAD ]]; then
    echo "Ошибка: ссылка не указана!"
    exit 1
fi

if [[ $LINK_DOWNLOAD != *aws.* ]]; then
    echo "Ошибка: подсказка ссылка должна содержать слова 'aws.'"
    exit 1
fi

LINK_BASE=$(echo "$LINK_DOWNLOAD" | cut -d'?' -f1)
# Получаем часть ссылки после последнего символа "/"
filename=$(basename "$LINK_BASE")
# Получаем расширение файла
extension="${filename##*.}"

rm -rf mysql/dumps/dump.gz
rm -rf mysql/dumps/dump.sql

status=$(curl -s -o /dev/null -w "%{http_code}" $LINK_DOWNLOAD)
echo "Статус: $status"

if [ $status -eq 200 ]; then
    echo "Скачиваем"
else
    echo "Сервис по ссылке недоступен или файл $status не найден."
    exit 1
fi

if [[ $extension == "gz" ]]; then
    echo "Файл скачивается в формате gzip"
    wget -O mysql/dumps/dump.gz $LINK_DOWNLOAD
    gunzip -c mysql/dumps/dump.gz >mysql/dumps/dump.sql
    rm mysql/dumps/dump.gz

elif [[ $extension == "sql" ]]; then
    echo "Файл скачивается в формате sql"
    wget -O mysql/dumps/dump.sql $LINK_DOWNLOAD
else
    echo "Ошибка: Неизвестный формат файла $extension"
    exit 1
fi

exit 0
