# Deployment ke Vercel - Aplikasi Rumah Gadai

Panduan lengkap untuk mendeploy aplikasi Laravel Rumah Gadai ke Vercel.

## Prasyarat

1. Akun Vercel (https://vercel.com)
2. Repository GitHub yang sudah terhubung
3. Aplikasi Laravel yang sudah siap

## File Konfigurasi yang Sudah Dibuat

### 1. `vercel.json`
File konfigurasi utama Vercel yang mengatur:
- Runtime PHP untuk serverless functions
- Routing untuk static assets dan API
- Environment variables untuk production
- Build command

### 2. `api/index.php`
Entry point untuk semua request Laravel di Vercel.

### 3. `.vercelignore`
File untuk mengecualikan file/folder yang tidak perlu di-deploy.

### 4. `build.sh`
Script build yang akan dijalankan saat deployment.

## Langkah-langkah Deployment

### 1. Push ke GitHub
```bash
git add .
git commit -m "Add Vercel configuration"
git push origin main
```

### 2. Import Project di Vercel
1. Login ke https://vercel.com
2. Klik "New Project"
3. Import repository GitHub Anda
4. Pilih "Laravel" sebagai framework preset (jika tersedia)

### 3. Konfigurasi Environment Variables
Di dashboard Vercel, tambahkan environment variables berikut:

**Required Variables:**
```
APP_NAME=Rumah Gadai
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-app.vercel.app

LOG_CHANNEL=stderr
SESSION_DRIVER=cookie
CACHE_DRIVER=array
QUEUE_CONNECTION=sync
```

**Database Variables (jika menggunakan database):**
```
DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

### 4. Generate APP_KEY
Untuk mendapatkan APP_KEY:
```bash
php artisan key:generate --show
```
Copy output dan tambahkan ke environment variables Vercel.

### 5. Deploy
Setelah konfigurasi selesai, Vercel akan otomatis melakukan deployment.

## Troubleshooting

### Error: "APP_KEY not set"
- Pastikan APP_KEY sudah ditambahkan di environment variables Vercel
- APP_KEY harus dalam format: `base64:xxxxx`

### Error: Database Connection
- Pastikan database variables sudah benar
- Gunakan database cloud seperti PlanetScale, Railway, atau Supabase

### Error: Storage/Cache
- Vercel menggunakan filesystem read-only
- Gunakan `CACHE_DRIVER=array` dan `SESSION_DRIVER=cookie`

### Error: Static Assets
- Pastikan assets sudah di-build dengan `npm run build`
- Check routing di `vercel.json` untuk static files

## Rekomendasi Database

Untuk production di Vercel, gunakan salah satu dari:

1. **PlanetScale** (MySQL-compatible)
   - Serverless MySQL platform
   - Free tier tersedia
   - Mudah integrasi dengan Vercel

2. **Supabase** (PostgreSQL)
   - Open source Firebase alternative
   - Free tier tersedia
   - Built-in authentication

3. **Railway** (MySQL/PostgreSQL)
   - Simple cloud database
   - Easy setup

## Monitoring

- Monitor deployment di Vercel Dashboard
- Check logs untuk debugging
- Setup monitoring untuk performance

## Custom Domain

1. Di Vercel Dashboard, pilih project
2. Go to "Settings" > "Domains"
3. Add custom domain
4. Update DNS records sesuai instruksi
5. Update `APP_URL` di environment variables

## Tips Optimasi

1. **Caching**: Gunakan Vercel Edge Caching untuk static assets
2. **Database**: Pilih region database yang dekat dengan Vercel region
3. **Assets**: Optimize images dan CSS/JS files
4. **Monitoring**: Setup error tracking (Sentry, Bugsnag)

## Support

Jika mengalami masalah:
1. Check Vercel deployment logs
2. Review Laravel logs
3. Konsultasi dokumentasi Vercel untuk Laravel