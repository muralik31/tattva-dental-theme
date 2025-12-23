# Tattva Dental Clinic - WordPress Theme

A modern, responsive WordPress theme built for Tattva Dental Clinic. Clean design with a dark aesthetic and cyan accents that matches the clinic's branding.

![Theme Preview](screenshot.png)

## Features

- 🦷 **Services Showcase** - Custom post type for dental services
- ⭐ **Patient Testimonials** - Display patient reviews with ratings
- 📸 **Before/After Gallery** - Showcase treatment results
- 📱 **Fully Responsive** - Looks great on all devices
- 🎨 **Modern Dark Theme** - Professional dark design with cyan accents
- 📍 **Google Maps Integration** - Show clinic location
- 📞 **Click-to-Call** - Easy phone contact
- 📅 **Appointment Booking** - Contact form for bookings
- ⚡ **Smooth Scrolling** - Single-page navigation experience

## Installation

1. Download or clone this repository
2. Upload the `tattva-dental` folder to `/wp-content/themes/`
3. Activate the theme in **Appearance → Themes**
4. Configure your settings in **Appearance → Customize**

## Configuration

### Contact Information
Go to **Appearance → Customize → Contact Information** to set:
- Phone number
- Email address
- Clinic address
- Office hours
- Google Maps embed URL

### Logo & Branding
Go to **Appearance → Customize → Site Identity** to upload your logo.

### Adding Content

| Content Type | Where to Add |
|--------------|--------------|
| Services | **Services → Add New** |
| Testimonials | **Testimonials → Add New** |
| Gallery Items | **Gallery → Add New** |

## Theme Structure

```
tattva-dental/
├── assets/
│   ├── css/
│   ├── images/
│   └── js/
│       └── main.js
├── front-page.php      # Homepage template
├── header.php          # Site header
├── footer.php          # Site footer
├── functions.php       # Theme functions & CPTs
├── style.css           # Main stylesheet
├── index.php           # Default template
├── page-services.php   # Services page
├── page-contact.php    # Contact page
├── page-about.php      # About page
├── page-gallery.php    # Gallery page
└── single-service.php  # Single service template
```

## Customization

### Colors
The theme uses CSS variables for easy customization. Main colors defined in `style.css`:

```css
--color-primary: #40E0D0;      /* Cyan/Turquoise */
--color-dark: #000000;         /* Background */
--color-surface: #0a0a0a;      /* Card backgrounds */
```

### Fonts
- **Headings:** Poppins
- **Body:** Inter

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Credits

Built with ❤️ for Tattva Dental Clinic, Hyderabad.

## License

This theme is licensed under the GPL v2 or later.

---

**Live Site:** [tattvadentalclinic.com](https://tattvadentalclinic.wordpress.com)

