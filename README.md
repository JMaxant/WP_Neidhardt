# Neidhardt Studios

Custom wordpress blank theme, design and front by Benoît Le Grasse, development by Julien Maxant

This theme is designed to be a simple and elegant theme, optimized for the usage of nested full screen videos and image display

The theme was designed for Neidhardt Studios, a music and sound studio based in Berlin.

## development and usage

This theme and its model were developed using a custom system of classes for the pages.

Although it's meant to be improved over time, it basically functions as any MVC pattern, just without the View (for now).

Any page model extends a base controller that contains all basic info of the page (ID, content, thumbnail, etc).

Specific controller allows processing fields/subfields without overcharging the template.

Data is called as any attribute (e.g. : $page->hello_world), as long as the controller is instanciated in the page.

All the php processing is done in the controller.

# Plugins used :
You absolutely require ACF Pro to have the best experience of this theme.

### Optional plugin include :
- WP_Maintenance
- Show current template (development plugin)

For more information on the studio, do not hesitate to contact them.
