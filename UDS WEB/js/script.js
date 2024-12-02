document.addEventListener('DOMContentLoaded', function() {
    console.log("JavaScript is ready!");

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Service details object
    const serviceDetails = {
        'social-media-management': {
            title: 'Social Media Management',
            description: 'Comprehensive management of your social media presence to boost engagement and drive traffic.',
            benefits: [
                'Increased brand awareness',
                'Higher engagement rates',
                'Consistent posting schedule',
                'Professional content creation'
            ]
        },
        'digital-advertising': {
            title: 'Digital Advertising',
            description: 'Strategic planning and execution of targeted ad campaigns across various digital platforms.',
            benefits: [
                'Increased website traffic',
                'Higher conversion rates',
                'Precise audience targeting',
                'Measurable ROI'
            ]
        },
        'analytics-and-reporting': {
            title: 'Analytics and Reporting',
            description: 'Monitoring and evaluating website data to assess performance and make data-driven decisions.',
            benefits: [
                'Informed decision-making',
                'Performance tracking',
                'Identification of improvement areas',
                'ROI measurement'
            ]
        },
        'website-design-and-development': {
            title: 'Website Design and Development',
            description: 'Creating responsive, user-friendly websites optimized for search engines.',
            benefits: [
                'Improved user experience',
                'Mobile responsiveness',
                'SEO optimization',
                'Increased conversions'
            ]
        },
        'video-marketing': {
            title: 'Video Marketing',
            description: 'Producing and marketing videos to showcase products/services and enhance brand awareness.',
            benefits: [
                'Increased engagement',
                'Better brand storytelling',
                'Improved conversion rates',
                'Enhanced social media presence'
            ]
        }
    };

    // Add click event listeners to service items
    document.querySelectorAll('.service-item').forEach(item => {
        item.addEventListener('click', function() {
            const serviceId = this.getAttribute('data-service-id');
            const serviceInfo = JSON.stringify(serviceDetails[serviceId]);
            window.location.href = `detail.html?service=${encodeURIComponent(serviceInfo)}`;
        });
    });
});