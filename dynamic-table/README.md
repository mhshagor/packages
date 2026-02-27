# Dynamic Table for Laravel

A powerful and flexible dynamic table component for Laravel applications with add, clone, and delete row functionality, smooth animations, and modern Tailwind CSS styling.

## Features

- ➕ **Dynamic Row Management** - Add, clone, and delete table rows on the fly
- 🎨 **Modern Styling** - Beautiful Tailwind CSS design with dark mode support
- ⚡ **Smooth Animations** - CSS transitions for elegant row operations
- 🔄 **Automatic Reindexing** - Form field names update automatically when rows are added/removed
- 📱 **Responsive Design** - Works perfectly on all device sizes
- 🎯 **Smart Validation** - Prevents deletion of the last row
- 🔧 **Easy Integration** - Simple Blade component and JavaScript setup
- 📦 **Zero Dependencies** - Pure JavaScript, no external libraries required

## Installation

1. Copy the component files to your Laravel project:
   ```
   packages/dynamic-table/
   ├── components/dynamic-table.blade.php
   ├── css/dynamic-table.css
   ├── js/dynamic-table.js
   └── demo/dynamic-table.html
   ```

2. Include the JavaScript in your layout or view:
   ```html
   <script src="{{ asset('packages/dynamic-table/js/dynamic-table.js') }}"></script>
   ```

3. Include the CSS (or use Tailwind CDN):
   ```html
   <link rel="stylesheet" href="{{ asset('packages/dynamic-table/css/dynamic-table.css') }}">
   ```

## Usage

### Basic Usage with Blade Component

```blade
<x-dynamic-table :th="['Name', 'Email', 'Role']" id="userTable">
    <input type="text" name="users[0][name]" placeholder="Name" class="w-full p-2 border border-gray-300 rounded-md" />
    <input type="email" name="users[0][email]" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-md" />
    <select name="users[0][role]" class="w-full p-2 border border-gray-300 rounded-md">
        <option value="">Select role</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
</x-dynamic-table>
```

### Standalone HTML Usage

```html
<table class="w-full border border-gray-300 dark:border-black/30 dynamicTable" id="myTable">
    <thead class="bg-black/30">
        <tr>
            <th class="whitespace-nowrap font-medium text-sm border-b dark:border-black/30 border-gray-300 text-center">Name</th>
            <th class="whitespace-nowrap font-medium text-sm border-b dark:border-black/30 border-gray-300 text-center">Email</th>
            <th class="whitespace-nowrap font-medium text-sm border-b dark:border-black/30 border-gray-300 text-center" width="0.5%">
                <button class="addRow bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 rounded-md p-2 text-center font-semibold text-white shadow-sm transition-colors duration-200 flex items-center justify-center h-8 w-8 m-0.5" title="Add Row">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </button>
            </th>
        </tr>
    </thead>
    <tbody class="appendClone">
        <tr class="text-sm border-b dark:border-black/30 border-gray-300 cloneRow">
            <td>
                <input type="text" name="users[0][name]" placeholder="Name" class="w-full p-2 border border-gray-300 rounded-md" />
            </td>
            <td>
                <input type="email" name="users[0][email]" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-md" />
            </td>
            <td>
                <button class="deleteRow bg-red-600 dark:bg-red-500 hover:bg-red-500 dark:hover:bg-red-400 rounded-md p-2 text-center font-semibold text-white shadow-sm transition-colors duration-200 flex items-center justify-center h-8 w-8 m-0.5" title="Delete Row">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </td>
        </tr>
    </tbody>
</table>
```

## Required Classes

The JavaScript requires these specific classes to function properly:

### Table Classes
- `dynamicTable` - Identifies the table for JavaScript operations
- `appendClone` - Container where new rows are added

### Row Classes
- `cloneRow` - Identifies rows that can be cloned and deleted

### Button Classes
- `addRow` - Triggers row addition
- `deleteRow` - Triggers row deletion

## Form Field Naming

Form fields must follow this naming pattern for automatic reindexing:

```html
<!-- Array format with index -->
<input name="users[0][name]" />
<input name="users[0][email]" />

<!-- When rows are added, indices update automatically -->
<input name="users[1][name]" />
<input name="users[1][email]" />
<input name="users[2][name]" />
<input name="users[2][email]" />
```

## JavaScript API

The component handles these operations automatically:

### Add Row
- Clones the first row in the table
- Resets all form field values
- Updates field names with new indices
- Applies smooth fade-in animation

### Delete Row
- Removes the clicked row
- Prevents deletion of the last row
- Reindexes remaining field names
- Applies smooth fade-out animation

### Reindex Function
- Automatically updates array indices in form field names
- Ensures proper server-side processing

## Customization

### Styling
The component uses Tailwind CSS classes. You can customize:

- **Colors**: Modify `bg-indigo-600`, `bg-red-600` classes
- **Spacing**: Adjust `p-2`, `m-0.5` classes
- **Borders**: Change `border-gray-300` classes
- **Transitions**: Modify `transition-colors duration-200` classes

### Animations
Animation styles are defined in JavaScript:

```javascript
// Fade in animation
clone.style.opacity = "0";
clone.style.transform = "translateY(-10px)";
// ... then ...
clone.style.opacity = "1";
clone.style.transform = "translateY(0)";

// Fade out animation
row.style.opacity = "0";
row.style.transform = "translateY(-10px)";
```

## Demo

Check the `demo/dynamic-table.html` file for a complete working example with:

- User management table
- Product inventory table  
- Contact form with notes
- Modern Tailwind CSS styling
- Full functionality demonstration

## Laravel Integration

### Service Provider Registration

```php
// config/app.php
'providers' => [
    // ...
    App\Providers\PackagesServiceProvider::class,
],
```

### Blade Component Registration

The component is automatically registered through the service provider and available as:
```blade
<x-dynamic-table />
```

## Browser Support

- ✅ Chrome 60+
- ✅ Firefox 55+
- ✅ Safari 12+
- ✅ Edge 79+

## License

MIT License - feel free to use in personal and commercial projects.

## Contributing

Contributions are welcome! Please feel free to submit pull requests or open issues for bugs and feature requests.