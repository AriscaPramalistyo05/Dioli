# Design Document: Admin Dashboard Redesign

## Overview

Redesign halaman admin panel aplikasi restoran Dioli menggunakan Tailwind CSS dengan desain modern terinspirasi TailAdmin. Implementasi mencakup dashboard dengan statistik, widget data, form modern untuk CRUD operations, modal konfirmasi delete, dan toast notifications.

## Architecture

### Technology Stack
- **Frontend Framework**: Laravel Blade Templates
- **CSS Framework**: Tailwind CSS (via CDN untuk kemudahan integrasi)
- **Icons**: Heroicons (SVG icons yang kompatibel dengan Tailwind)
- **JavaScript**: Alpine.js untuk interaktivitas (modals, toasts, dropdowns)

### File Structure
```
resources/views/admin/
├── layouts/
│   └── tailwind-master.blade.php    # Master layout dengan Tailwind
├── components/
│   ├── stat-card.blade.php          # Reusable stat card component
│   ├── modal-delete.blade.php       # Delete confirmation modal
│   ├── toast.blade.php              # Toast notification component
│   └── form-input.blade.php         # Styled form input component
├── dashboard.blade.php              # Main dashboard page
└── [existing files updated with new styling]
```

## Components and Interfaces

### 1. Master Layout (tailwind-master.blade.php)

Layout utama yang menggantikan adminmaster.blade.php dengan Tailwind CSS.

```html
<!-- Pseudocode Structure -->
<!DOCTYPE html>
<html>
<head>
    <!-- Tailwind CSS CDN -->
    <!-- Alpine.js CDN -->
    <!-- Custom styles -->
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar Component -->
        @include('admin.components.sidebar-tailwind')
        
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            @include('admin.components.topnav-tailwind')
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Toast Container -->
    @include('admin.components.toast')
</body>
</html>
```

### 2. Stat Card Component

```blade
<!-- Input: $title, $value, $icon, $color -->
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500 font-medium">{{ $title }}</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $value }}</p>
        </div>
        <div class="w-12 h-12 rounded-full bg-{{ $color }}-100 flex items-center justify-center">
            <!-- Icon SVG with $color -->
        </div>
    </div>
</div>
```

### 3. Delete Modal Component

```blade
<!-- Alpine.js powered modal -->
<div x-data="{ open: false, itemName: '', deleteUrl: '' }" 
     x-show="open"
     @open-delete-modal.window="open = true; itemName = $event.detail.name; deleteUrl = $event.detail.url">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    
    <!-- Modal Content -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-md w-full p-6">
            <!-- Warning Icon -->
            <!-- Message: "Apakah Anda yakin ingin menghapus {itemName}?" -->
            <!-- Buttons: Cancel (gray), Delete (red) -->
        </div>
    </div>
</div>
```

### 4. Toast Notification Component

```blade
<div x-data="{ toasts: [] }" 
     @toast.window="toasts.push($event.detail); setTimeout(() => toasts.shift(), 3000)"
     class="fixed top-4 right-4 z-50 space-y-2">
    
    <template x-for="toast in toasts">
        <div :class="toast.type === 'success' ? 'bg-green-500' : 'bg-red-500'"
             class="text-white px-4 py-3 rounded-lg shadow-lg flex items-center space-x-2">
            <!-- Icon based on type -->
            <span x-text="toast.message"></span>
        </div>
    </template>
</div>
```

### 5. Form Input Component

```blade
<!-- Input: $name, $label, $type, $value, $icon, $error -->
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
    <div class="relative">
        @if($icon)
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <!-- Icon SVG -->
        </div>
        @endif
        <input type="{{ $type }}" 
               name="{{ $name }}"
               value="{{ $value }}"
               class="w-full px-4 py-2.5 {{ $icon ? 'pl-10' : '' }} 
                      border border-gray-300 rounded-lg
                      focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500
                      transition-colors
                      {{ $error ? 'border-red-500 focus:ring-red-500' : '' }}">
    </div>
    @if($error)
    <p class="mt-1 text-sm text-red-500">{{ $error }}</p>
    @endif
</div>
```

## Data Models

### Dashboard Data (passed from Controller)

```php
// DashboardController@index
return view('admin.dashboard', [
    'totalUsers' => User::count(),
    'totalMenus' => Menu::count(),
    'totalOrders' => Pesan::count(),
    'totalBlogs' => Blog::count(),
    'recentOrders' => Pesan::with('user')->latest()->take(5)->get(),
    'menuByCategory' => Menu::selectRaw('kategori, COUNT(*) as count')
                            ->groupBy('kategori')
                            ->get(),
]);
```

### Menu Categories Enum
```
Murah | Ekonomi | Premium | Snack | Minuman
```

## Correctness Properties

*A property is a characteristic or behavior that should hold true across all valid executions of a system-essentially, a formal statement about what the system should do.*


Based on the prework analysis, the following testable properties have been identified:

### Property 1: Dashboard Statistics Accuracy

*For any* database state with users, menus, orders (pesans), and blogs, the dashboard controller SHALL pass the exact count of each entity type to the view, matching the actual database record counts.

**Validates: Requirements 2.1, 2.2, 2.3, 2.4, 2.5**

### Property 2: Recent Orders Limit

*For any* database with N orders where N >= 0, the recent orders query SHALL return min(N, 5) orders, ordered by created_at descending (most recent first).

**Validates: Requirements 3.1**

### Property 3: Menu Category Grouping

*For any* set of menu items in the database, the menu summary query SHALL return the correct count for each category, and the sum of all category counts SHALL equal the total menu count.

**Validates: Requirements 4.1**

### Property 4: Delete Operation Integrity

*For any* valid entity (menu, blog, user, koki, pesan), when a delete operation is confirmed, the entity SHALL be removed from the database and subsequent queries SHALL not return that entity.

**Validates: Requirements 8.7**

## Error Handling

### Form Validation Errors
- Display inline error messages below each invalid field
- Highlight invalid fields with red border
- Preserve user input on validation failure
- Show summary of errors at top of form (optional)

### Delete Operation Errors
- If delete fails (e.g., foreign key constraint), show error toast
- Modal should close and display error message
- No data should be modified on failure

### Data Loading Errors
- If database query fails, show fallback UI with error message
- Log error for debugging
- Display "Unable to load data" message in affected widget

## Testing Strategy

### Unit Tests
- Test DashboardController returns correct data structure
- Test each model's count queries
- Test delete operations for each entity type

### Property-Based Tests
- Use PHPUnit with data providers to test statistics accuracy across various database states
- Test recent orders query with varying order counts (0, 1, 5, 10, 100)
- Test menu category grouping with various category distributions

### Integration Tests
- Test full dashboard page renders without errors
- Test form submissions create/update records correctly
- Test delete flow removes records

### Manual/Visual Tests
- Responsive layout on different screen sizes
- Modal animations and transitions
- Toast notification appearance and auto-dismiss
- Form focus states and validation styling

## Color Scheme

Based on existing Dioli branding (cyan/info theme):

```
Primary: cyan-500 (#06b6d4)
Primary Dark: cyan-600 (#0891b2)
Success: green-500 (#22c55e)
Warning: yellow-500 (#eab308)
Danger: red-500 (#ef4444)
Background: gray-100 (#f3f4f6)
Card Background: white (#ffffff)
Text Primary: gray-800 (#1f2937)
Text Secondary: gray-500 (#6b7280)
```

## Implementation Notes

1. **Tailwind CSS Integration**: Use CDN for quick setup, can migrate to build process later
2. **Alpine.js**: Lightweight JS framework for modals and toasts without heavy dependencies
3. **Backward Compatibility**: Keep existing routes and controllers, only update views
4. **Progressive Enhancement**: Forms work without JS, modals/toasts enhance UX
