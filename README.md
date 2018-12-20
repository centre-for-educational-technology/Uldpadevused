# Üldpädevused

Requires cron.

## Adding new worksheet templates



Each template is mentioned in multiple files. To add a new template, you need to do the following steps.


### 1. Create the template's form file in views/default/forms/sheets. (look at other templates' forms for examples)


All forms must start with these lines:

\<?php<br>
session_start();<br>
$wcode = elgg_extract('wcode', $vars);<br>
$page = elgg_extract('page', $vars);<br>
$maxp = elgg_extract('maxp', $vars);<br>
$poll = elgg_extract('poll', $vars);<br>
form_view_hidden_fields($wcode, $page, $maxp, $poll);<br>

and usually end with this line:

form_view_buttons($wcode, $page, $maxp, $poll);<br>


The single form file handles all pages of a worksheet, it can use the $page variable to recognise which page it should display.

Fields of each page must be named "q1", "q2", .. and they should display the current value retrieved from session. You can always get it from "$\_SESSION\[$wcode.'p'.$poll.'p'.$page.'q1'\]", where "q1" represents the field name.


### 2. Add a new action reference to elgg-plugin.php. Set access to public and filename to "\_\_DIR\_\_ . '/actions/sheets/formsubmit.php'". If the worksheet is meant to have a timelimit, used timedsubmit.php instead.


Example:

'sheets/metacognition' => \[<br>
  'access' => 'public',<br>
  'filename' => \_\_DIR\_\_ . '/actions/sheets/formsubmit.php'<br>
\],<br>


### 3. Add a definition of the template to the array const worksheets in start.php.


Example definition (note that all of the properties here must be declared for each worksheet):

2 => \[<br>
    'name' => 'Lugemise metakognitsioon lastele',<br>
    'file' => 'sheets/metacognition',<br>
    'pages' => \[<br>
      1 => 6, 2 => 6, 3 => 6,<br>
      4 => 6, 5 => 6, 6 => 6, 7 => 6<br>
    \],<br>
    'timelimit' => 86400,<br>
    'alias' => 'meta'<br>
  \],<br>
  
  The id at the beginning must be unique for each template and they count up from 1.
  
  'name' is only displayed to the user.
  
  'file' is the route to the form file.
  
  'pages' is an array that defines all pages of the form and how many questions each of them have. In the example, there are 7 pages that each have 6 questions. Page id-s must also all be unique and count up starting from 1.
  
  'timelimit' defines how much time is given to the user for answering the form in seconds. It is only required and used when your form uses timedsubmit.php.
  
  'alias' is a short unique name for the worksheet which is used for downloadable csv files to distinguish between fields of different forms.


### 4. Extra step for time-limited forms.


All time-limited forms should have a "this is a timed form" warning page as the first page. The timer starts only after the first page of the form is submitted. This page should be marked in start.php as having 0 questions.