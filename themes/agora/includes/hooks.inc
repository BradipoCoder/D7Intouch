<?php

use Mekit\Drupal7\Exception\ThemeException;
use Mekit\Drupal7\HookExecutor;

/**
 * Implements hook_preprocess_html()
 *
 * @param array $vars
 *
 * @throws ThemeException
 */
function agora_preprocess_html(&$vars)
{
    HookExecutor::executeGenericHook(['preprocess', 'html'], [&$vars]);
}

/**
 * Implements hook_preprocess_page()
 *
 * @param array $vars
 *
 * @throws ThemeException
 */
function agora_preprocess_page(&$vars)
{
    HookExecutor::executeGenericHook(['preprocess', 'page'], [&$vars]);
    if(drupal_is_front_page())
    {
        HookExecutor::executeGenericHook(['preprocess', 'front'], [&$vars]);
    }
}

/**
 * Implements hook_preprocess_node()
 *
 * @param array $vars
 */
function agora_preprocess_node(&$vars)
{
    HookExecutor::executeNodeHooks(['preprocess', 'node'], [&$vars]);
}

/**
 * Implements hook_preprocess_field()
 *
 * @param array $vars
 */
function agora_preprocess_field(&$vars)
{
    HookExecutor::executeFieldHooks(['preprocess', 'field'], [&$vars]);
}

/**
 * Implements hook_preprocess_paragraphs_items()
 *
 * @param $vars
 */
function agora_preprocess_paragraphs_items(&$vars)
{
    HookExecutor::executeGenericHook(['preprocess', 'paragraphs_items'], [&$vars]);
}

/**
 * Implements hook_preprocess_paragraphs_item()
 *
 * @param $vars
 */
function agora_preprocess_entity(&$vars)
{
    HookExecutor::executeEntityHooks(['preprocess', 'entity'], [&$vars]);
}

/**
 * Generic node(all types) edit form hook
 *
 * @param array $form
 * @param array $form_state
 */
function agora_form_node_form_alter(&$form, $form_state)
{
    HookExecutor::executeGenericHook(['alter', 'form', 'node_edit'], [&$form, $form_state]);
}

/**
 * Form specific alter hook
 *
 * @param array  $form
 * @param array  $form_state
 * @param string $form_id
 */
function agora_form_alter(&$form, &$form_state, $form_id)
{
    HookExecutor::executeGenericHook(['alter', 'form', 'id', $form_id], [&$form, $form_state], true);
}

/**
 * Css alter hook
 *
 * @param array $css
 */
function agora_css_alter(&$css)
{
    HookExecutor::executeGenericHook(['alter', 'css'], [&$css], true);
}

/**
 * Js alter hook
 *
 * @param array $js
 */
function agora_js_alter(&$js)
{
    HookExecutor::executeGenericHook(['alter', 'javascript'], [&$js], true);
}

/**
 * Form specific alter hook
 *
 * @param array  $data
 * @param array  $router_item
 * @param string $root_path
 */
function agora_menu_local_tasks_alter(&$data, $router_item, $root_path)
{
    HookExecutor::executeGenericHook(['alter', 'menu', 'local_tasks'], [&$data, $router_item, $root_path]);
}

