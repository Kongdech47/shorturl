วิธีติดตั้ง

1. ติดตั้งโปรแกรม Docker Desktop บนเครื่อง ดาวน์โหลดที่ https://www.docker.com/products/docker-desktop/
2. เปิดโปรแกรม Docker Desktop แล้วรอให้สถานขึ้น ENGINE RUNNING (สีเขียวล่างซ้ายของโปรแกรม)
3. เปิดโค้ดด้วยโปรแกรม VS Code
4. แก้ไขชื่อไฟล์จาก .env เป็น env
5. เปิด Terminal ใน VS Code
6. รันคำสั่ง docker-compose up -d ใน Terminal
7. รันคำสั่ง docker exec shorturl_www /bin/bash -c 'php spark migrate' ใน Terminal เพื่อสร้าง Database 
8. แก้ไขชื่อไฟล์จาก env เป็น .env
9. เข้าใช้งานเว็บผ่าน Browser ที่ url localhost
10. เสร็จสิ้น

*อธิบายเพิ่มเติม ใน Dockerfile จะมีการติดตั้ง PHP GD Extension เพื่อใช้สร้าง QR Code
