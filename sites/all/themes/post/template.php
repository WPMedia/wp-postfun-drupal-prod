<?php
// $Id: sites/all/themes/post/template.php 1.19 2010/02/17 14:45:50EST Linda M. Williams (WILLIAMSLM) Production  $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to post_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: post_breadcrumb()
 *
 *   where post is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 */

 function post_quiz_progress($question_number, $num_of_question) {
  // Determine the percentage finished (not used, but left here for other implementations).
  //$progress = ($question_number*100)/$num_of_question;

  // Get the current question # by adding one.
  $current_question = $question_number + 1;

  $output  = '';
  //$output .= '<div id="quiz_progress">';
  //$output .= t('Page %x of %y', array('%x' => $current_question, '%y' => $num_of_question));
  //$output .= '</div><br />'."\n";
  //$output .= '<div class="countdown"></div>';
  return $output;
}


function post_multichoice_report($question, $showpoints, $showfeedback) {
  include_once ("includes/usercookie.php");
  // Build the question answers header (add blank space for IE).
  //$innerheader = array(t('Answers'));
  //if ($showpoints) {
  //  $innerheader[] = t('Correct Answer');
  //}
  //$innerheader[] = t('User Answer');
  //if ($showfeedback) {
  //  $innerheader[] = '&nbsp;';
  //}
  $sql = "select parent_nid from {quiz_node_relationship} where child_nid=%d and child_vid=%d";
  $quiz_nid = db_result(db_query($sql,$question->answers[0]['nid'],$question->answers[0]['vid']));
  $sql = "select field_challenge_value from {content_type_quiz} where nid=%d";
  $challenge = db_result(db_query($sql,$quix_nid));

  $output='';
  foreach ($question->answers as $aid => $answer) {
    if ($answer['user_answer']){
        if ($challenge==='false'){
            if ($answer['is_correct']){
                $output.='<div class="correct">Correct!</div>';
            }else{
                $output.='<div class="incorrect">Incorrect!</div>';
            }
            $output .= '<div class="q_answer">'.check_markup($answer['answer'],$answer['format']).'</div>';
            $output .= '<div class="q_feedback">'.check_markup($answer['feedback'], $answer['format']).'</div>';
        }else {
            $output .= '<div class="challenge_title">'.check_markup($answer['title'],$answer['format']).':</div>';
            $output .= '<div class="challenge_question">'.check_markup($answer['body'],$answer['format']).'</div>';
            $output .= '<div class="challenge_answer">You answered:'.check_markup($answer['answer'],$answer['format']).'</div>';
            $output .= '<div class="challenge_feedback">'.check_markup($answer['feedback'], $answer['format']).'</div>';
        }
    }


    //$cols = array();
    //$cols[] = check_markup($answer['answer'], $answer['format']);
    //if ($showpoints) {
    //  $cols[] = $answer['is_correct'] ? theme_multichoice_selected() : theme_multichoice_unselected();
    //}
    //$cols[] = $answer['user_answer'] ? theme_multichoice_selected() : theme_multichoice_unselected();
    //$cols[] = ($showfeedback && $answer['user_answer']) ? '<div class="quiz_answer_feedback">'. check_markup($answer['feedback'], $answer['format']) .'</div>' : '';
    //$rows[] = $cols;
  }

  // Add the cell with the question and the answers.
  //$q_output = '<div class="quiz_summary_question"><span class="quiz_question_bullet">Q:</span> '. check_markup($question->body) .'</div>';
  //$q_output .= theme('table', $innerheader, $rows) .'<br />';
  //return $q_output;
  return $output;
}

function post_quiz_feedback($questions, $showpoints = TRUE, $showfeedback = FALSE) {
  $header = array(format_plural(count($questions), t('Question Result'), t('Question Results')));
  $rows = array();

  // Go through each of the questions.
  foreach ($questions as $question) {
    $cols = array();
    // Ask each question to render a themed report of how the user did.
    $module = quiz_module_for_type($question->type);

    $report .= theme($module .'_report', $question, $showpoints, $showfeedback);

    // Only include reports with actual data:
    //if (!empty($report) && strlen($report) > 0) {

    //  $cols[] = array('data' => $report, 'class' => 'quiz_summary_qrow');

      // Get the score result for each question only if it's a scored quiz.
    //  if ($showpoints) {

    //    $theme = ($question->correct) ? 'quiz_score_correct' : 'quiz_score_incorrect';
    //    $cols[] = array('data' => theme($theme), 'class' => 'quiz_summary_qcell');
     // }
      // Pack all of this into a table row.
    //  $rows[] = array('data' => $cols, 'class' => 'quiz_summary_qrow');
    //}
  }

  //return theme('table', $header, $rows);
  return $report;
}

function post_quiz_take_summary($quiz, $questions, $score, $summary) {
  // Set the title here so themers can adjust.
  drupal_set_title(check_plain($quiz->title));

  // Display overall result.
  $output = '';

  // Only display scoring information if this is not a personality test:
  //if ($score['percentage_score']) {
  //if (!empty($score['possible_score'])) {
  //  if (!$score['is_evaluated']) {
  //    $msg = t(
  //      'Parts of this @quiz have not been evaluated yet. The score below is not final.',
  //      array('@quiz' => QUIZ_NAME)
  //    );
  //    drupal_set_message($msg, 'error');
  //  }
  //  $output .= '<div id="quiz_score_possible">'. t('You got %num_correct of %question_count possible points.', array('%num_correct' => $score['numeric_score'], '%question_count' => $score['possible_score'])) .'</div>'."\n";
  //  $output .= '<div id="quiz_score_percent">'. t('Your score: %score%', array('%score' => $score['percentage_score'])) .'</div><br />'."\n";
  //}
  $output .= '<div id="quiz_summary">'. check_markup($summary, $quiz->format) .'</div><br />'."\n";
  // Get the feedback for all questions.
  $output .= theme('quiz_feedback', $questions, ($quiz->pass_rate > 0), TRUE);

  $sql= "SELECT sum(points_awarded) points from {game_user_points} where game_nid=%d and userid='%s'";
  $user_points = db_result(db_query($sql,$quiz->field_game[0]['nid'],getUserName()));

  $output .= '<div class="userscore"> You have '.$user_points.' points in this game.</div>';

  if ($quiz->field_challenge[0]['value'] === 'false'){
    $sql = "select count(userid) from {game_user_points} where quiz_nid=%d";
    $total_answered = db_result(db_query($sql,$quiz->nid));
    $sql = "select count(userid) from {game_user_points} where quiz_nid=%d and points_awarded>0";
    $total_answered_correct = db_result(db_query($sql,$quiz->nid));

    $output .= '<div class="everyscore"> '.$total_answered_correct.' of '.$total_answered.' people overall answered this question correctly'.'</div>';
  }
  return $output;
}

 /* CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/*
 * Add any conditional stylesheets you will need for this sub-theme.
 *
 * To add stylesheets that ALWAYS need to be included, you should add them to
 * your .info file instead. Only use this section if you are including
 * stylesheets based on certain conditions.
 */
/* -- Delete this line if you want to use and modify this code
// Example: optionally add a fixed width CSS file.
if (theme_get_setting('post_fixed')) {
  drupal_add_css(path_to_theme() . '/layout-fixed.css', 'theme', 'all');
}
// */

include( str_replace('//','/',dirname(__FILE__).'/') .'../constants.php');
/**
 * Implementation of HOOK_theme().
 */
function post_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
// -- Delete this line if you want to use this function
function post_preprocess(&$vars, $hook) {
    $vars['baseurl'] = BASEURL;
  $vars['termsurl'] = BASEURL . TERMSURL;
  $vars['privacyurl'] = BASEURL . PRIVACYURL;
  $vars['returnpolicyurl'] = BASEURL . RETURNPOLICYURL;
  //$vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
// -- Delete this line if you want to use this function
function post_preprocess_page(&$vars, $hook) {
  //$vars['sample_variable'] = t('Lorem ipsum.');
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $suggestions = array();
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
        $suggestions[] = $template_filename;
      }
      $vars['template_files'] = $suggestions;
    }
  }
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function post_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function post_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function post_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

