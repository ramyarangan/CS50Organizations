Lucy Cheng, Michelle Deng, & Ramya Rangan
Organizations
THE DESIGN CS50 Organizations is a web application developed to facilitate communication and planning for student
organizations. Designed along the model-view-controller framework, the site uses PHP and SQL for backend
management and logic and HTML/CSS and JavaScript for front-end rendering and user experience. Templates
do not directly query and manipulate data, as per MVC standards.
THE MODEL.
Most of the M of our MVC was a SQL database, administrated through phpMyAdmin, as in Problem Set 7.
We decided to use the following main tables, which stored key ID information and associated users with
clubs, events, and announcements:
• users: Stores user identification data obtained during registration, such as the user’s name, email,
hashed password, and administrator status. Users have auto-incremented primary key integer IDs to
facilitate unique, memory-efficient identification.
• clubs: Analogous to users. Stores club identification data, such as its name, primary email,
abbreviation, and description. Clubs also have auto-incremented primary key integer IDs to facilitate
unique, memory-efficient identification.
• clubTypes: Stores user-specified attributes describing clubs, e.g. “social” or “academic”, and this
information was stored in a separate ClubTypes table, linking clubs to their types by ID.
• subscriptions: Associates users with their selected clubs, along with their permitted privacy level.
Privacy levels are stored as integers, not as words, for memory efficiency.
• notifications: Used for alerting users of events related to their organizations. Stores description, time
stamp of events, redirect link, and seen/not seen.
• calendarLinks: Used for querying the Google calendars for events. Stores links for each calendar
associated with a given club and privacy level. The events stored in our events table are also stored
by Google in the appropriate calendars. Google’s event storage is used when calendars UIs are
rendered, while our event storage is used for any other interaction with events on the site. Though
such a framework doubles the storage needed for our events, it also provides an efficient way to
provide the extra built-in functionality of Google calendars.
• events: Table of club events, associated with their club, creator, start/end times of event, and
description. A primary function of the site is to help users keep track of club events.
• announcements: Analogous to events. Table of messages, associated with announcer ID, club ID,
time of creation. The other core function of the site is to convey messages from club admins to
members.
Because we often chose to reference fields (e.g. users, clubs, privacies, attributes, etc.) by ID integers rather
than strings, we also included a few helper tables associating IDs with descriptors. In the long run, storing 4-
byte integers as opposed to varchar(255) strings saves more space.
THE CONTROLLER—PHP.
PHP drives the Controller portion of our framework.
From database to template
Using PHP, we make SQL queries to our databases and then analyze/sort/associate/manipulate the data.
Then, through GET and POST requests, we pass formatted data to our front-end HTML/CSS files, with which
browsers can render pages accordingly. As mentioned, we took care to separate our template files (in the
template folder) from programmatic logic, which was performed through our PHP files in our html folder.
For communicating with HTML files, our choice of GET and POST depended on the situation. For things like
club homepages or search results, which are produced and rendered in the same fashion for a variety of
inputs, we didn’t want to design a new page for each input, but we still wanted users to be able to bookmark
their club/input-specific page and to access them without submitting the same form again. Therefore, we used
GET requests to render these files. But for more secure requests, such as account creation, where we
wouldn’t want certain data to appear in plain text in the URL, we used POST requests.
Interfacing with Google Calendar
We used Google’s Calendar API to facilitate storing and displaying events in a user-friendly and customizable
manner. To interface with Google Calendars, we used the functions provided by the Zend framework, a
package that includes Google’s calendar API. We maintained all calendars for the site on a google account
made for our website. We stored authorization information for this email account in a variable that is saved in
the browser’s $_SESSION global variable. By storing this information, we ensure that we have the
authorization to add and retrieve calendars as necessary throughout the website.
We chose to create separate calendars for each club that was created. Google does not provide tools to tag
and selectively display events on a single calendar, so we created multiple calendars to allow our users to
toggle between different calendar views (select specific clubs to view or select specific privacy levels to view
events by). When each club is created, we generate 5 standardized empty calendars corresponding to the all
possible privacy levels for the club, and we store these calendars’ links in a separate calendarLinks table in our
database. We use these stored links to add events to our calendar and display them throughout the website.
Since the default calendars created using these commands were private, we added rules to alter the scope of
our calendars in the corresponding access control lists (ACLs) through POST requests to Google. By making
these calendars public, we ensured that users would be able to view the events displayed to them on our
calendars.
When displaying calendars, we combine separate calendars’ events by altering the url of the calendar
displayed as appropriate. Programmatically changing the URL of our embedded calendars allows us to
manipulate the collection of events displayed on the Google calendar UI based on user input, user
membership levels, and the current page of the website. Ultimately, this scheme allows us to ensure that
users can decide what events they want to see when, as long as they are authorized to do so.
By using the Google calendar UI, we also allow users to export any version of the calendars they see on the
website onto their personal calendars, simply by clicking the export option on the bottom right of any
calendar.
Email/Text
We also use PHP to programmatically send mail and text messages via the PHPmailer class. Each user’s email
is stored in our databases upon registration, and each club’s administrative email is also stored. These emails
in most cases are sent when users and clubs interact, perhaps when a user sends an email to a club
administrator, or when a user signs up for email notifications from a club. Emails are also sent used as a tool
for verification if a user has lost his or her password. When the user tries to recover their password, a hashed
version of their current password is sent to their email address with instructions. By using this hashed
password as a code for any future password changes, we ensure that no malicious users can reset another
member’s password. Text notifiactions are less frequent; users can choose to subscribe to a mobile feed of
their clubs’ announcements. Texts are generated by sending an email to a user’s indicated phone provider
using the PHPmailer class.
THE VIEW.
HTML/CSS
As per the MVC design, our front-end template files, when run, were mostly HTML and CSS; we only used
PHP to programmatically print repeated or patterned elements of our code, such as table rows.
Because we wished our site to be a user-friendly, simple, and clean-cut tool for students to organize their
busy organization-lives, we wanted a modern, clean-cut, and functional design. Hence, we chose to continue
using Twitter’s Bootstrap libraries as our CSS/JS base scaffolding. Bootstrap provided us with diverse readymade
classes that were formatted simply yet in an aesthetically pleasing manner, from basics such as tables,
forms, and buttons, to fancier transitions like modals and accordion widgets.
That said, we also wished to customize our pages on top of Bootstrap. To do so, we placed repeated styles
(e.g. our page headers, section titles, announcements blurbs, etc.) in a separate stylesheet called styles.css in
the css/ folder. Linking to the stylesheet via header.php provides easy access to these common elements
across many pages. For element-specific formatting, such as particular adjustments to the margins/padding or
one-time color/text alignment changes, we used in-line CSS style commands. Finally, there was a page or two
where we wanted to apply certain styles to repeated elements, but only in those pages. In those situations,
we specified styles in block <style> </style> tags at the top of those templates.
Also, Bootstrap did not provide a couple of notable functionalities we desired: 1) a calendar date/time picker,
which we use in our Create Events page, 2) a dropdown dynamic menu for our notification system, and 3) a
multiselect checkbox dropdown, which we use in our search filters and which is far easier to use than the
default multiselect menu provided, which requires ctrl- / apple- holding while clicking desired elements. For all
of these, we were able to find open source widgets, which we integrated into our site. The third was built
based on Bootstrap but was missing some elements like section dividers and titles, which we wanted to help
organize our search parameters, so we wrote them ourselves.
JavaScript
We use JavaScript extensively to make our site more interactive. To allow us to access elements of the DOM
effectively, and make use of a variety of event-based functions, we used the jQuery plugin extensively on our
site.
On the home page, jQuery is used to allow the user to toggle between different calendar and announcement
filters (filter by club and privacy level), allowing them to view updated calendars as they toggle between their
desired viewing options. As the user indicates a change in their desired filters, implemented as a multi-select
form element, an AJAX request is made that sends the data from the html template files to PHP files that
retrieve the calendar URL and announcement list (in order of posting time) that must be displayed on the
home page. The user is able to switch between an events and announcements tab on the home page using
another script. Javascript is also used to update the status of a user’s notifications (seen or unseen) on the
page, and unseen notifications have highlighting removed as the user clicks on the appropriate notifications tab
in the navigation bar. Finally, a script is used to allow the user to search the site for clubs (by name), events
(by title), or announcements (by title), providing an auto-complete feature by using AJAX to interface
potential search results with the user’s currently typed input.
Much of the communication on the website is completed using forms, many of which have the potential for
user error. To catch errors in filling out and submitting forms, whether for registration or creating new clubs,
we used jQuery scripts to check form inputs after the user has made any changes to that element in the
form. Through AJAX calls upon form input changes, we validate user inputs on the fly.
JavaScript is also used to allow a club admin to specify the time of their events quickly and efficiently. When
creating an event, a timepicker plugin is used to display a calendar and time selector UI; the user can
manipulate this UI easily to choose their event start and end date/time.
