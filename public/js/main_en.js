$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText : ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

// $(document).on('ready', function() {
//     $("#input-20").fileinput({
//         browseClass: "btn btn-primary btn-block",
//         showCaption: false,
//         showRemove: false,
//         showUpload: false
//     });
// });

$(".inputUploadDataProject").fileinput({
    defaultPreviewContent: '<img src="http://ksatranslators.com/images/cloud-computing.svg" alt="Your Avatar"><h6 class="text-muted up-text">Drag files here</h6>' +
    '<h6 class="text-muted">Or Click to select</h6>',
    browseOnZoneClick: true,
    initialPreviewAsData: true,
    required: true,

});

$(".inputUploadDataProject2").fileinput({
    defaultPreviewContent: '<img src="http://ksatranslators.com/images/cloud-computing.svg" alt="Your Avatar"><h6 class="text-muted up-text">Drag files here</h6>' +
    '<h6 class="text-muted">Or Click to select</h6>',
    browseOnZoneClick: true,
    initialPreviewAsData: true,

});