# Инструкция по запуску:
Необходимо выполнить команду:\
``docker compose up -d --build``\
после этого проект будет запущен на **localhost:80**

# Реализованные эндпоинты

1. _/oauth_ - для обмена кода аутентификации на access токен
2. _/webhook/contacts/create_ - для обработки хука на создание контакта
3. _/webhook/contacts/update_ - для обработки хука на изменение контакта
4. _/webhook/leads/create_ - для обработки хука на создание сделки
5. _/webhook/leads/update_ - для обработки хука на изменение сделки

## Примеры запросов:
1. _/oauth_:
```
curl --location 'http://vbudai8u.beget.tech/oauth?code=%3Ccode%3E&referer=etesttask.amocrm.ru&platform=1&client_id=%3Cclient_id%3E&from_widget=1' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Content-Type: text/plain' \
--header 'Referer;'
```

2. _/webhook/contacts/create_:
```
curl --location 'http://localhost:80/webhook/contacts/create' \
--header 'accept-encoding: gzip' \
--header 'x-amocrm-requestid: ac0999fe-a56c-434d-b7ba-8cb676f02e26' \
--header 'content-type: application/x-www-form-urlencoded' \
--header 'content-length: 753' \
--header 'user-agent: amoCRM-Webhooks/3.0' \
--data-urlencode 'account%5Bsubdomain%5D=etesttask' \
--data-urlencode 'account%5Bid%5D=32427762' \
--data-urlencode 'account%5B_links%5D%5Bself%5D=https://etesttask.amocrm.ru' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bid%5D=37054081' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bname%5D=Абиба абибович' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bresponsible_user_id%5D=10000698' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bdate_create%5D=1748289231' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Blast_modified%5D=1748289231' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bcreated_user_id%5D=10000698' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bmodified_user_id%5D=10000698' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Baccount_id%5D=32427762' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bcreated_at%5D=1748289231' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Bupdated_at%5D=1748289231' \
--data-urlencode 'contacts%5Badd%5D%5B0%5D%5Btype%5D=contact'
```
3. _/webhook/contacts/update_:
```
curl --location 'http://localhost:80/webhook/contacts/update' \
--header 'accept-encoding: gzip' \
--header 'x-amocrm-requestid: 249d486e-b53a-465a-8fe2-f6cd830ad18a' \
--header 'content-type: application/x-www-form-urlencoded' \
--header 'content-length: 2012' \
--header 'user-agent: amoCRM-Webhooks/3.0' \
--data-urlencode 'account%5Bsubdomain%5D=etesttask' \
--data-urlencode 'account%5Bid%5D=32427762' \
--data-urlencode 'account%5B_links%5D%5Bself%5D=https://etesttask.amocrm.ru' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bid%5D=37054081' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bname%5D=Абиба абибович' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bresponsible_user_id%5D=10000698' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bdate_create%5D=1748289231' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Blast_modified%5D=1748292937' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcreated_user_id%5D=10000698' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bmodified_user_id%5D=10000698' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Baccount_id%5D=32427762' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B0%5D%5Bid%5D=735647' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B0%5D%5Bname%5D=Должность' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B0%5D%5Bvalues%5D%5B0%5D%5Bvalue%5D=555' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B0%5D%5Bcode%5D=POSITION' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bid%5D=735649' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bname%5D=Телефон' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bvalues%5D%5B0%5D%5Bvalue%5D=333' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bvalues%5D%5B0%5D%5Benum%5D=718321' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bcode%5D=PHONE' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B2%5D%5Bid%5D=735651' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B2%5D%5Bname%5D=Email' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B2%5D%5Bvalues%5D%5B0%5D%5Bvalue%5D=444' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B2%5D%5Bvalues%5D%5B0%5D%5Benum%5D=718333' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B2%5D%5Bcode%5D=EMAIL' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bold_responsible_user_id%5D=10000698' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bcreated_at%5D=1748289231' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Bupdated_at%5D=1748292937' \
--data-urlencode 'contacts%5Bupdate%5D%5B0%5D%5Btype%5D=contact'
```
4. _/webhook/leads/create_:
```
curl --location 'http://localhost:80/webhook/leads/create' \
--header 'accept-encoding: gzip' \
--header 'x-amocrm-requestid: 471e2579-9a4a-4ce1-8af8-039aa98fd063' \
--header 'content-type: application/x-www-form-urlencoded' \
--header 'content-length: 735' \
--header 'user-agent: amoCRM-Webhooks/3.0' \
--data-urlencode 'account%5Bsubdomain%5D=etesttask' \
--data-urlencode 'account%5Bid%5D=32427762' \
--data-urlencode 'account%5B_links%5D%5Bself%5D=https://etesttask.amocrm.ru' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bid%5D=32966269' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bname%5D=Test' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bstatus_id%5D=76789230' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bprice%5D=999' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bresponsible_user_id%5D=10000698' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Blast_modified%5D=1748268669' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bmodified_user_id%5D=10000698' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bcreated_user_id%5D=10000698' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bdate_create%5D=1748268669' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bpipeline_id%5D=9621010' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Baccount_id%5D=32427762' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bcreated_at%5D=1748268669' \
--data-urlencode 'leads%5Badd%5D%5B0%5D%5Bupdated_at%5D=1748268669'
```
5. _/webhook/leads/update_:
```
curl --location 'http://localhost:80/webhook/leads/update' \
--header 'accept-encoding: gzip' \
--header 'x-amocrm-requestid: 423651ce-905d-4833-9db0-a21f44575517' \
--header 'content-type: application/x-www-form-urlencoded' \
--header 'content-length: 1247' \
--header 'user-agent: amoCRM-Webhooks/3.0' \
--data-urlencode 'account%5Bsubdomain%5D=etesttask' \
--data-urlencode 'account%5Bid%5D=32427762' \
--data-urlencode 'account%5B_links%5D%5Bself%5D=https://etesttask.amocrm.ru' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bid%5D=32966269' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bname%5D=Test' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bstatus_id%5D=76789230' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bprice%5D=9919' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bresponsible_user_id%5D=10000698' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Blast_modified%5D=1748268812' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bmodified_user_id%5D=10000698' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcreated_user_id%5D=10000698' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bdate_create%5D=1748268669' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bpipeline_id%5D=9621010' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Baccount_id%5D=32427762' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B0%5D%5Bid%5D=752009' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B0%5D%5Bname%5D=Поле1' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B0%5D%5Bvalues%5D%5B0%5D%5Bvalue%5D=1' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bid%5D=752011' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bname%5D=Поле2' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcustom_fields%5D%5B1%5D%5Bvalues%5D%5B0%5D%5Bvalue%5D=2' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bcreated_at%5D=1748268669' \
--data-urlencode 'leads%5Bupdate%5D%5B0%5D%5Bupdated_at%5D=1748268812'
```
