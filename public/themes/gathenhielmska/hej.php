[_event_title] => Array
(
[label] => Event Title
[type] => text
[required] => 1
[placeholder] => Event title
[priority] => 1
)

[_event_type] => Array
(
[label] => Event Type
[type] => term-select
[required] => 1
[placeholder] =>
[priority] => 2
[default] => meeting-or-networking-event
[taxonomy] => event_listing_type
)

[_event_category] => Array
(
[label] => Event Category
[type] => term-select
[required] => 1
[placeholder] =>
[priority] => 3
[default] =>
[taxonomy] => event_listing_category
)

[_event_online] => Array
(
[label] => Online Event
[type] => radio
[default] => no
[options] => Array
(
[yes] => Yes
[no] => No
)

[priority] => 4
[required] => 1
)

[_event_venue_name] => Array
(
[label] => Venue Name
[type] => text
[required] => true
[placeholder] => Please enter the venue name
[priority] => 5
)

[_event_address] => Array
(
[label] => Address
[type] => text
[required] => true
[placeholder] => Please enter street name and number
[priority] => 6
)

[_event_pincode] => Array
(
[label] => Zip Code
[type] => text
[required] => 1
[placeholder] => Please enter zip code (Area code)
[priority] => 8
)

[_event_location] => Array
(
[label] => Event Location
[type] => text
[required] => 1
[placeholder] => Location for google map
[priority] => 7
)

[_event_banner] => Array
(
[label] => Event Banner
[type] => file
[required] => 1
[placeholder] =>
[priority] => 9
[ajax] => 1
[multiple] =>
[allowed_mime_types] => Array
(
[jpg] => image/jpeg
[jpeg] => image/jpeg
[gif] => image/gif
[png] => image/png
)

)

[_event_description] => Array
(
[label] => Description
[type] => wp-editor
[required] => 1
[placeholder] =>
[priority] => 10
)

[_registration] => Array
(
[label] => Registration email/URL
[type] => text
[required] => 1
[placeholder] => Enter an email address or website URL
[priority] => 11
)

[_event_start_date] => Array
(
[label] => Start Date
[placeholder] => Please enter event start date
[type] => date
[priority] => 12
[required] => 1
)

[_event_start_time] => Array
(
[label] => Start Time
[placeholder] => Please enter event start time
[type] => time
[priority] => 13
[required] => 1
)

[_event_end_date] => Array
(
[label] => End Date
[placeholder] => Please enter event end date
[type] => date
[priority] => 14
[required] => 1
)

[_event_end_time] => Array
(
[label] => End Time
[placeholder] => Please enter event end time
[type] => time
[priority] => 15
[required] => 1
)

[_event_registration_deadline] => Array
(
[label] => Registration Deadline
[type] => date
[required] =>
[placeholder] => Please enter registration deadline
[priority] => 20
)

[_organizer_name] => Array
(
[label] => Organization name
[type] => text
[required] => 1
[placeholder] => Enter the name of the organization
[priority] => 1
)

[_organizer_logo] => Array
(
[label] => Logo
[type] => file
[required] =>
[placeholder] =>
[priority] => 2
[ajax] => 1
[multiple] =>
[allowed_mime_types] => Array
(
[jpg] => image/jpeg
[jpeg] => image/jpeg
[gif] => image/gif
[png] => image/png
)

)

[_organizer_description] => Array
(
[label] => Organizer Description
[type] => wp-editor
[required] => 1
[placeholder] =>
[priority] => 3
)

[_organizer_email] => Array
(
[label] => Organization Email
[type] => text
[required] => 1
[placeholder] => Enter your email address
[priority] => 5
)

[_organizer_website] => Array
(
[label] => Website
[type] => text
[required] =>
[placeholder] => Website URL e.g http://www.yourorganization.com
[priority] => 6
)

[_organizer_twitter] => Array
(
[label] => Twitter
[type] => text
[required] =>
[placeholder] => Twitter URL e.g http://twitter.com/yourorganizer
[priority] => 7
)

[_organizer_youtube] => Array
(
[label] => Youtube
[type] => text
[required] =>
[placeholder] => Youtube Channel URL e.g http://www.youtube.com/channel/yourcompany
[priority] => 8
)

[_organizer_facebook] => Array
(
[label] => Facebook
[type] => text
[required] =>
[placeholder] => Facebook URL e.g http://www.facebook.com/yourcompany
[priority] => 10
)
