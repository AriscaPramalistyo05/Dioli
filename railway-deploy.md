# Railway CLI Deployment

## Install Railway CLI
```bash
# Windows (PowerShell)
iwr -useb https://railway.app/install.ps1 | iex

# Or via npm
npm install -g @railway/cli
```

## Deploy Steps
```bash
# 1. Login to Railway
railway login

# 2. Initialize project
railway init

# 3. Link to existing project (if you created one via web)
railway link [project-id]

# 4. Add MySQL database
railway add mysql

# 5. Set environment variables
railway variables set APP_NAME=Dioli
railway variables set APP_ENV=production
railway variables set APP_DEBUG=false
railway variables set APP_KEY=base64:bOBhD6h6bbI25Rx6+QLZG/Icdre4ErQM1IO47OE82r8=

# 6. Deploy
railway up
```