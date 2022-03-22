วิธีติดตั้ง

1. ติดตั้งโปรแกรม Docker Desktop บนเครื่อง ดาวน์โหลดที่ https://www.docker.com/products/docker-desktop/
2. เปิดโปรแกรม Docker Desktop แล้วรอให้สถานขึ้น ENGINE RUNNING (สีเขียนล่างซ๊ายของโปรแกรม)
3. เปิดโค้ดด้วยโปรแกรม VS Code และเปิด Terminal
4. รันคำสั่ง docker exec shorturl_www /bin/bash -c 'php spark migrate' ใน Terminal เพื่อสร้าง Database 
5. แก้ไขชื่อไฟล์จาก env เป็น .env
6. เข้าใช้งานเว็บผ่าน Browser ที่ url localhost
7. เสร็จสิ้น
