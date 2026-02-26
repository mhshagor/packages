# Accordion for Laravel

A beautiful and customizable accordion component for Laravel applications with smooth animations, color customization, and intelligent contrast handling.

## Features

- 🎨 **Customizable Colors** - Dynamic color schemes with automatic contrast adjustment
- 📱 **Responsive Design** - Works on all device sizes
- ⚡ **Smooth Animations** - CSS transitions for elegant expand/collapse effects
- 🎯 **Single Open Mode** - Only one accordion item open at a time by default
- 🔧 **Easy Integration** - Simple Blade component usage
- 📦 **Zero Dependencies** - Pure JavaScript, no external libraries required
- 🎭 **Smart Contrast** - Automatically adjusts text color based on background

## Installation

### 1. Install the package

```bash
composer require mhshagor/packages:accordion
```

### 2. Publish the assets

```bash
php artisan vendor:publish --tag=accordion
```

### 3. Add to your app.js

Add this line to your `resources/js/app.js`:

```javascript
import "./sgd/accordion.js";
```

### Add to your app.css

Add this line to your `resources/css/app.css`:

```css
@import "./sgd/accordion.css";
```

### 4. Compile your assets

```bash
npm run dev
# or
npm run build
```

## Usage

### Basic Usage

```blade
<x-sgd.accordion title="Section Title">
    <p>Your content goes here...</p>
</x-sgd.accordion>
```

### Advanced Usage

```blade
<x-sgd.accordion 
    title="Advanced Section" 
    :open="true"
    color="#3b82f6"
    id="custom-accordion"
>
    <div class="p-4">
        <h3 class="font-bold mb-2">Advanced Content</h3>
        <p>This accordion is open by default and has a custom blue color.</p>
    </div>
</x-sgd.accordion>
```

### Multiple Accordions

```blade
<div class="space-y-2">
    <x-sgd.accordion title="First Section" color="#10b981">
        <p>Content for the first section...</p>
    </x-sgd.accordion>
    
    <x-sgd.accordion title="Second Section" color="#f59e0b">
        <p>Content for the second section...</p>
    </x-sgd.accordion>
    
    <x-sgd.accordion title="Third Section" color="#ef4444">
        <p>Content for the third section...</p>
    </x-sgd.accordion>
</div>
```

## Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `title` | string | 'Accordion' | Display title for the accordion header |
| `open` | boolean | false | Whether the accordion should be open by default |
| `id` | string | (auto-generated) | Unique identifier for the accordion |
| `color` | string | '#e5e7eb' | Background color for the accordion header |

## Color Options

The accordion accepts any valid CSS color format:

### Hex Colors
```blade
color="#3b82f6"  <!-- Blue -->
color="#10b981"  <!-- Green -->
color="#f59e0b"  <!-- Amber -->
```

### RGB/RGBA Colors
```blade
color="rgb(59, 130, 246)"
color="rgba(59, 130, 246, 0.8)"
```

### HSL Colors
```blade
color="hsl(217, 91%, 60%)"
```

### Named Colors
```blade
color="blue"
color="lightgray"
```

## Styling

The component uses CSS custom properties and includes:

- `.sgd-accordion` - Main accordion container
- `.sgd-accordion-item` - Individual accordion item wrapper
- `.sgd-accordion-btn` - Clickable header button
- `.sgd-accordion-icon` - Chevron icon
- `.sgd-accordion-content` - Collapsible content area
- `.sgd-accordion-content-body` - Content wrapper with padding

### CSS Structure

```css
.sgd-accordion-item {
    border: 1px solid #e5e7eb;
    border-radius: 0.25rem;
    overflow: hidden;
    margin-bottom: 3px;
}

.sgd-accordion-btn {
    width: 100%;
    text-align: left;
    padding: 0.35rem 1rem;
    font-weight: 500;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

.sgd-accordion-icon {
    width: 1rem;
    height: 1rem;
    transition: transform .3s;
}

.sgd-accordion-item.open .sgd-accordion-icon {
    transform: rotate(180deg);
}
```

## JavaScript Behavior

The accordion JavaScript provides:

- **Automatic Initialization** - Accordions are initialized on DOM ready
- **Color Application** - Dynamic color application with contrast detection
- **Single Open Mode** - Only one accordion item can be open at a time within a group
- **Smooth Transitions** - CSS transitions for expand/collapse animations
- **Smart Contrast** - Automatically calculates and applies contrasting text colors

### Manual Initialization

You can manually initialize accordions with a custom selector:

```javascript
import { initAccordions } from './sgd/accordion.js';

// Initialize accordions with custom selector
initAccordions('.my-custom-accordion');

// Initialize all accordions
initAccordions();
```

## Form Integration

The accordion works seamlessly with Laravel forms:

```blade
<form method="POST">
    @csrf
    
    <x-sgd.accordion title="User Information" color="#3b82f6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2">
            </div>
        </div>
    </x-sgd.accordion>
    
    <x-sgd.accordion title="Address Information" color="#10b981">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Street</label>
                <input type="text" name="street" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">City</label>
                <input type="text" name="city" class="w-full border rounded px-3 py-2">
            </div>
        </div>
    </x-sgd.accordion>
    
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Submit
    </button>
</form>
```

## Customization

### Custom Component Location

If you want to customize the component, you can modify the published files:

- **Views**: `resources/views/components/sgd/accordion.blade.php`
- **JavaScript**: `resources/js/sgd/accordion.js`
- **CSS**: `resources/css/sgd/accordion.css`

### Custom Styling

Add custom CSS to override default styles:

```css
.sgd-accordion-btn {
    /* Custom button styling */
    font-size: 1rem;
    font-weight: 600;
}

.sgd-accordion-content-body {
    /* Custom content styling */
    line-height: 1.6;
}

.sgd-accordion-icon {
    /* Custom icon styling */
    color: inherit;
}
```

### Custom Animations

Modify the transition effects:

```css
.sgd-accordion-icon {
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.sgd-accordion-content {
    transition: max-height 0.4s ease-in-out;
}
```

## Browser Support

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## Support

For support, please contact [mhshagor](mailto:srq001100@gmail.com).

---

**Made with ❤️ for the Laravel community**
