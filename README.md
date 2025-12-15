# Laravel Meet System (會議室管理系統)

本專案包含兩個主要版本迭代：

## 📂 版本說明

| 版本 | 狀態 | 描述 | 路徑 |
| :--- | :--- | :--- | :--- |
| **v2** | 🟢 **Active** | **2025 全新重寫版**。基於 Laravel 11 + Docker + Vite (Tailwind)。 | [`./v2`](./v2) |
| **v1** | 🔴 Legacy | 2016 舊版系統 (Laravel 5.2)。僅供參考與資料對照。 | [`./v1`](./v1) |

---

## 🚀 如何啟動 (v2 新版)

我們提供了一鍵啟動腳本，無需記憶 Docker 指令：

**Windows 使用者**：
1. 進入 `v2` 資料夾。
2. 雙擊執行 `start_v2.bat`。
3. 系統將自動啟動並開啟瀏覽器。

**手動啟動 (Terminal)**：
```bash
cd v2
docker compose up -d
# 前端 (Port 8081): http://localhost:8081
# 後台 (Port 8081): http://localhost:8081/admin
# DB管理 (Port 8082): http://localhost:8082
```

> **注意**: v1 與 v2 使用不同的 Port (8000 vs 8081)，理論上可同時運行，但建議擇一開啟以節省資源。
> 若需啟動 v1，請參考 v1 資料夾內的說明。
