# 🚢 Laravel Ship Management System

## 🛠️ Project Overview

This is a **PHP Laravel** application designed to manage ships, crew members, and their associated skills. The system provides an admin interface for handling ship modules, crew members, skills, and profiles.

The application uses **Laravel** with **Blade templates** and a **PostgreSQL** database.

### 👨‍✈️ Admin Capabilities:
- 📝 **List Modules, Crew Members, and Skills**
- ➕ **Add New Ship Module, Crew Member, or Skill**
- ✏️ **Edit Existing Records**
- 🗑️ **Delete Unwanted Entries**
- 🔍 **View Detailed Profiles**

---

## ⚙️ Technologies Used

- 🐘 **PHP Laravel Framework**
- 🖼️ **Blade Templating Engine**
- 🗂️ **PostgreSQL Database**
- 🌐 **HTML5, CSS3, JavaScript**
- 🛠️ **Composer** for dependency management

---

## 📂 Project Structure

```
.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── ModuleController.php
│   │   │   ├── CrewController.php
│   │   │   └── SkillController.php
│   ├── Models
│   │   ├── Module.php
│   │   ├── Crew.php
│   │   └── Skill.php
├── database
│   ├── migrations
├── resources
│   ├── views
│   │   ├── modules
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── edit.blade.php
│   │   ├── crew
│   │   └── skills
├── routes
│   └── web.php
└── .env
```

---

## 🚀 Getting Started

### 📋 Prerequisites

- PHP 8.x
- Laravel Installer
- PostgreSQL Database
- Composer

### 🛠️ Installation Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Barbarossa01/ship-management-laravel.git
   cd ship-management-laravel
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Environment Configuration**:
   - Create a `.env` file from `.env.example`.
   - Configure database settings:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=ship_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Run Database Migrations**:
   ```bash
   php artisan migrate
   ```

5. **Start the Application**:
   ```bash
   php artisan serve
   ```

6. **Access the App**:
   Open `http://localhost:8000` in your web browser.

---

## 🖼️ Application Features

### 🚢 **Module Management**
- View, add, edit, and delete ship modules.

### 👨‍👩‍👧‍👦 **Crew Management**
- Manage crew member details.

### ⚙️ **Skill Management**
- Assign and manage skills for crew members.

### 🧩 **Profile Viewing**
- View detailed crew profiles including associated skills and modules.

---

## 🔍 Code Overview

### 📘 **Model Example: Module**
```php
class Module extends Model
{
    protected $fillable = ['name', 'description'];

    public function crewMembers()
    {
        return $this->hasMany(Crew::class);
    }
}
```

### 🚀 **Controller Example: ModuleController**
```php
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string'
    ]);

    Module::create($request->all());

    return redirect()->route('modules.index')->with('success', 'Module created successfully.');
}
```

### 🖼️ **Blade Template: Add Module**
```html
<form action="{{ route('modules.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Module Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Module</button>
</form>
```

### 🌐 **Routes**
```php
Route::resource('modules', ModuleController::class);
Route::resource('crew', CrewController::class);
Route::resource('skills', SkillController::class);
```

---

## 🔐 Security & Best Practices

- Input validation in controllers.
- CSRF protection using Laravel's built-in middleware.
- Use environment variables for sensitive data.

---

## 🚧 Future Improvements

- 🔐 Implement authentication and role-based access control.
- 📊 Add analytics for module usage.
- 🌐 Improve UI for better user experience.

**Happy Coding! 😊**

