# **Tertateur** 🎭🖥️  

_On l'appelle comment ?_  
**Tertateur dans 2 bords** 🎶  

---

## **👥 Noms & Prénoms**  
- 💻 **SALOMON Clément**  
- 🎨 **LEPERLIER Maël**  
- 🛠️ **GOUACHE Nathan**  
- 🔥 **SEJOURNE Victor**  

---

## **🛠️ Setup & Installation**  

### **1️⃣ Prérequis 📦**  

🐘 **PHP** (>= 8.1)  
📦 **Composer**  
🏗️ **Symfony CLI**  
🌱 **Node.js** (si besoin)  
🛢️ **MySQL ou SQLite** pour la base de données  

---

### **2️⃣ Installation 🏗️💻**  

💾 **Clone le repo** :  

```bash
git clone https://github.com/GOUACHE-Nathan-2225041aa/Tertateur
cd Tertateur
```

📥 **Installe les dépendances** :  

```bash
composer install
```

---

### **3️⃣ Configuration 🔧⚙️**  

⚠️ **Modifier les credentials de la base de donnée ici :**  

```env
DATABASE_URL="mysql://root:password@127.0.0.1:3306/bdsymfony"
```

🔄 **Récupérer la table et la migration** :  

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

📊 **Ajouter les fixtures** :  

```bash
php bin/console doctrine:fixtures:load
```

---

### **4️⃣ Lancer le serveur 🚀🔥**  

▶️ **Démarre Symfony** :  

```bash
symfony serve
```

---
### **5️⃣ C’est en ligne 🎉🎈**  

🌍 **Accède à ton projet sur :**  
🔗 **http://127.0.0.1:8000**  
---

**JE VEUX JUSTE FAIRE PARTIE DE TA SYMFONYYYYYYYYYYYY 🎶💜**

![Symfony Meme](https://i.pinimg.com/736x/1a/85/42/1a8542a91efa897d9e2a5fd8774d33e2.jpg)
