# 會議記錄系統 (Meeting Record System)

這是一個基於 Laravel 5.2 開發的會議記錄系統 (2016)。
目前的版本已加入 Docker 支援，方便在現代環境中執行以供參考。

## 快速開始 (使用 Docker)

本專案已容器化，您無需在電腦上安裝舊版 PHP 即可執行。

### 1. 啟動環境
確保您已安裝 [Docker Desktop](https://www.docker.com/products/docker-desktop/)。
在專案根目錄執行以下指令：
```bash
docker compose up -d --build
```
這會啟動 PHP、Nginx 和 MySQL 服務。

### 2. 初始化 (首次執行需做)
等待容器啟動後，執行以下指令完成初始化：

```bash
# 1. 安裝 PHP 依賴 (如果在容器內沒有自動安裝)
docker compose exec app composer install

# 2. 設定環境變數
docker compose exec app cp .env.example .env
docker compose exec app php artisan key:generate

# 3. 資料庫遷移與種子資料 (如果需要)
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
```

### 3. 瀏覽網站
打開瀏覽器訪問： [http://localhost:8000](http://localhost:8000)

## 開發者資訊
- **PHP 版本**: 7.1 (透過 Docker)
- **Laravel 版本**: 5.2
- **資料庫**: MySQL 5.7
  - Host: db
  - User: root
  - Password: johnny
  - Database: laravel_web2

## 注意事項
- 此專案目前處於 **Phase 1 (環境復活)** 階段，僅用於參考舊有邏輯，不建議直接用於生產環境。
- `docker-compose.yml` 定義了完整的執行環境。
