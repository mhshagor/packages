# MHShagor Packages

A comprehensive Laravel package collection containing beautiful, reusable components for modern web applications.

## Available Packages

### 📦 Image Picker
A beautiful and customizable image picker component with drag-and-drop support, multiple preview types, and file validation.

**Installation:**
```bash
composer require mhshagor/packages:image-picker
```

**Features:**
- 🖼️ Drag & Drop Support
- 📱 Responsive Design  
- 🎨 Multiple Preview Types (Grid, List, Thumbnail, Dropdown)
- ✅ File Validation
- 🔄 Multiple Files Support
- 🎯 Easy Blade Integration

**Usage:**
```blade
<x-sgd.image-picker 
    name="profile_image" 
    label="Profile Image"
    :multiple="true"
    max="10"
    type="image"
    preview-type="grid"
/>
```

---

### 🎵 Accordion
A beautiful and customizable accordion component with smooth animations, color customization, and intelligent contrast handling.

**Installation:**
```bash
composer require mhshagor/packages:accordion
```

**Features:**
- 🎨 Customizable Colors
- 📱 Responsive Design
- ⚡ Smooth Animations
- 🎯 Single/Multiple Open Modes
- 🔧 Easy Blade Integration
- 🎭 Smart Contrast Handling

**Usage:**
```blade
<x-sgd.accordion 
    title="Section Title" 
    :open="true"
    color="#3b82f6"
>
    <p>Your content goes here...</p>
</x-sgd.accordion>
```

---

## 🚀 Quick Start

### 1. Install Packages

```bash
# Install Image Picker
composer require mhshagor/packages:image-picker

# Install Accordion
composer require mhshagor/packages:accordion

# Install both packages
composer require mhshagor/packages:image-picker mhshagor/packages:accordion

# Install complete package collection
composer require mhshagor/packages
```

### 2. Publish Assets

```bash
# Publish Image Picker assets
php artisan vendor:publish --tag=image-picker

# Publish Accordion assets
php artisan vendor:publish --tag=accordion

# Publish all packages
php artisan vendor:publish --tag=all
```

### 3. Add to Your App

**Add to `resources/js/app.js`:**
```javascript
import "./sgd/image-picker.js";
import "./sgd/accordion.js";
```

**Add to `resources/css/app.css`:**
```css
@import "./sgd/image-picker.css";
@import "./sgd/accordion.css";
```

### 4. Compile Assets

```bash
npm run dev
# or
npm run build
```

---

## 🎨 Component Examples

### Image Picker Gallery

```blade
{{-- User Profile --}}
<x-sgd.image-picker 
    name="avatar" 
    label="Profile Avatar"
    :multiple="false"
    max="2"
    type="image"
    preview-type="thumbnail"
    :required="true"
/>

{{-- Photo Gallery --}}
<x-sgd.image-picker 
    name="gallery" 
    label="Photo Gallery"
    :multiple="true"
    max="10"
    type="image"
    preview-type="grid"
/>

{{-- Document Upload --}}
<x-sgd.image-picker 
    name="documents" 
    label="Upload Documents"
    :multiple="true"
    max="5"
    type="file"
    preview-type="list"
    accept=".pdf,.doc,.docx"
/>
```

### Accordion Sections

```blade
{{-- FAQ Section --}}
<div class="space-y-2">
    <x-sgd.accordion title="What is Laravel?" color="#3b82f6">
        <p>Laravel is a web application framework with expressive, elegant syntax.</p>
    </x-sgd.accordion>
    
    <x-sgd.accordion title="Why use packages?" color="#10b981">
        <p>Packages provide reusable components that save development time.</p>
    </x-sgd.accordion>
    
    <x-sgd.accordion title="How to install?" color="#f59e0b">
        <p>Use composer to install packages and artisan to publish assets.</p>
    </x-sgd.accordion>
</div>

{{-- Form with Accordions --}}
<form method="POST" enctype="multipart/form-data">
    @csrf
    
    <x-sgd.accordion title="Personal Information" color="#6366f1" :open="true">
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
    
    <x-sgd.accordion title="Address Information" color="#059669">
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

---

## 🎯 Advanced Usage

### Custom Styling

```css
/* Custom Image Picker Styles */
.image-picker {
    border: 2px dashed #3b82f6;
    border-radius: 8px;
    background: #f8fafc;
}

.image-picker .base-label {
    color: #1e293b;
    font-weight: 600;
}

/* Custom Accordion Styles */
.sgd-accordion-btn {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    border-radius: 8px;
}

.sgd-accordion-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
```

### JavaScript Events

```javascript
// Image Picker Events
document.addEventListener('imagePicker:fileAdded', (event) => {
    console.log('File added:', event.detail.file);
});

document.addEventListener('imagePicker:fileRemoved', (event) => {
    console.log('File removed:', event.detail.fileId);
});

// Accordion Events
document.addEventListener('accordion:opened', (event) => {
    console.log('Accordion opened:', event.detail.sectionId);
});

document.addEventListener('accordion:closed', (event) => {
    console.log('Accordion closed:', event.detail.sectionId);
});
```

---

## 🔧 Configuration Options

### Image Picker Full Configuration

```blade
<x-sgd.image-picker 
    name="files"
    id="custom-file-picker"
    label="Upload Files"
    :multiple="true"
    max="10"
    type="image"
    :required="true"
    preview="true"
    preview-type="grid"
    accept="image/*"
    class="border-2 border-blue-500 rounded-lg"
    labelClass="text-lg font-bold text-blue-700"
/>
```

### Accordion Full Configuration

```blade
<x-sgd.accordion 
    title="Advanced Accordion"
    id="custom-accordion"
    :open="false"
    color="#8b5cf6"
    data-multiple="true"
    class="shadow-lg"
>
    <div class="p-6">
        <h3 class="text-xl font-bold mb-4">Advanced Content</h3>
        <p>This accordion has custom configuration options.</p>
        <ul class="list-disc pl-6 mt-2">
            <li>Custom ID and color</li>
            <li>Additional CSS classes</li>
            <li>Advanced content styling</li>
        </ul>
    </div>
</x-sgd.accordion>
```

---

## 📁 Published File Structure

After publishing, your resources will be organized as:

```
resources/
├── views/
│   └── components/
│       └── sgd/
│           ├── form/
│           │   └── image-picker.blade.php
│           └── accordion.blade.php
├── js/
│   └── sgd/
│       ├── image-picker.js
│       └── accordion.js
└── css/
    └── sgd/
        ├── image-picker.css
        └── accordion.css

📁 Published Demo
resources/
└── views/
    └── sgd/
        ├── image-picker/
        │   └── index.html
        └── accordion/
            └── index.html

```

---

## 🎨 Component Namespace

All components use the `sgd` namespace:

```blade
<!-- Image Picker -->
<x-sgd.image-picker />

<!-- Accordion -->
<x-sgd.accordion />
```

---

## 🔧 Configuration

### Service Provider

The `PackagesServiceProvider` automatically handles:

- ✅ Asset publishing
- ✅ Component registration
- ✅ Path resolution
- ✅ Demo file publishing

### Customization

You can customize any component by modifying the published files:

- **Views**: `resources/views/components/sgd/`
- **JavaScript**: `resources/js/sgd/`
- **CSS**: `resources/css/sgd/`

---

## 🌟 Features Overview

| Feature | Image Picker | Accordion |
|----------|---------------|------------|
| Drag & Drop | ✅ | ❌ |
| Multiple Preview Types | ✅ | ❌ |
| File Validation | ✅ | ❌ |
| Color Themes | ❌ | ✅ |
| Smooth Animations | ✅ | ✅ |
| Responsive Design | ✅ | ✅ |
| Laravel Integration | ✅ | ✅ |
| Zero Dependencies | ✅ | ✅ |
| Accessibility Support | ✅ | ✅ |

---

## 📱 Browser Support

All components support:
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

---

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

---

## 📄 License

This package collection is open-sourced software licensed under the [MIT license](LICENSE).

---

## 📞 Support

For support, please contact [mhshagor](mailto:srq001100@gmail.com).

---

**Made with ❤️ for the Laravel Community**

### 🚀 Ready to build amazing applications? Start with MHShagor Packages!
