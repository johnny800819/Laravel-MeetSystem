@echo off
chcp 65001 >nul
:: ==========================================
:: Laravel MeetSystem v2 一鍵啟動腳本
:: ==========================================
:: 說明: 此腳本位於 v2 資料夾，會自動啟動 Docker 環境。
:: 包含服務:
::   1. App server (Laravel PHP 8.2)
::   2. Database (MySQL 8.0)
::   3. Web server (Nginx - Port 8081)
::   4. Frontend (Vite/Node - Port 5173)
::   5. DB Management (phpMyAdmin - Port 8082)
:: ==========================================

cd /d "%~dp0"

echo [1/3] 檢查 Docker Desktop 狀態...
docker info >nul 2>&1
if %errorlevel% neq 0 (
    echo [錯誤] 偵測到 Docker 未啟動！無法執行。
    echo 請先手動開啟 Docker Desktop，等待左下角亮綠燈後再執行此腳本。
    pause
    exit /b
)

echo [2/3] 啟動所有容器服務...
docker compose up -d

echo [3/3] 執行系統初始化與快取清理...
docker compose exec app php artisan optimize:clear

echo ==========================================
echo  專案已啟動完成！
echo ==========================================
echo  前台首頁: http://localhost:8081
echo  後台管理: http://localhost:8081/admin (User: admin@admin.com / Pass: 123456)
echo  開發資源: http://localhost:5173 (Vite HMR)
echo  資料庫管理: http://localhost:8082 (User: laravel / Pass: password)
echo ==========================================
echo  正在為您開啟瀏覽器 (後台)...

start http://localhost:8081/admin

pause
