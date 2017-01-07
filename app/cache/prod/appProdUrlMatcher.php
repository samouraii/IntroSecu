<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/categorie')) {
            // manu_categorie
            if (rtrim($pathinfo, '/') === '/categorie') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'manu_categorie');
                }

                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieController::indexAction',  '_route' => 'manu_categorie',);
            }

            // manu_categorie_show
            if (preg_match('#^/categorie/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_categorie_show')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieController::showAction',));
            }

            // manu_categorie_new
            if ($pathinfo === '/categorie/new') {
                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieController::newAction',  '_route' => 'manu_categorie_new',);
            }

            // manu_categorie_create
            if ($pathinfo === '/categorie/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_manu_categorie_create;
                }

                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieController::createAction',  '_route' => 'manu_categorie_create',);
            }
            not_manu_categorie_create:

            // manu_categorie_edit
            if (preg_match('#^/categorie/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_categorie_edit')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieController::editAction',));
            }

            // manu_categorie_update
            if (preg_match('#^/categorie/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_manu_categorie_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_categorie_update')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieController::updateAction',));
            }
            not_manu_categorie_update:

            // manu_categorie_delete
            if (preg_match('#^/categorie/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_manu_categorie_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_categorie_delete')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieController::deleteAction',));
            }
            not_manu_categorie_delete:

        }

        if (0 === strpos($pathinfo, '/question')) {
            // manu_question
            if (rtrim($pathinfo, '/') === '/question') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'manu_question');
                }

                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::indexAction',  '_route' => 'manu_question',);
            }

            // manu_question_show
            if (preg_match('#^/question/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_question_show')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::showAction',));
            }

            // manu_question_show_random
            if ($pathinfo === '/question/random') {
                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::randomAction',  '_route' => 'manu_question_show_random',);
            }

            // manu_question_new
            if ($pathinfo === '/question/new') {
                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::newAction',  '_route' => 'manu_question_new',);
            }

            // manu_question_create
            if ($pathinfo === '/question/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_manu_question_create;
                }

                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::createAction',  '_route' => 'manu_question_create',);
            }
            not_manu_question_create:

            // manu_question_edit
            if (preg_match('#^/question/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_question_edit')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::editAction',));
            }

            // manu_question_update
            if (preg_match('#^/question/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_manu_question_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_question_update')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::updateAction',));
            }
            not_manu_question_update:

            // manu_question_delete
            if (preg_match('#^/question/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_manu_question_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_question_delete')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::deleteAction',));
            }
            not_manu_question_delete:

            // manu_question_search
            if ($pathinfo === '/question/search') {
                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionController::searchAction',  '_route' => 'manu_question_search',);
            }

        }

        if (0 === strpos($pathinfo, '/statistique')) {
            // manu_statistique
            if (rtrim($pathinfo, '/') === '/statistique') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'manu_statistique');
                }

                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueController::indexAction',  '_route' => 'manu_statistique',);
            }

            // manu_statistique_show
            if (preg_match('#^/statistique/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_statistique_show')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueController::showAction',));
            }

            // manu_statistique_new
            if ($pathinfo === '/statistique/new') {
                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueController::newAction',  '_route' => 'manu_statistique_new',);
            }

            // manu_statistique_create
            if ($pathinfo === '/statistique/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_manu_statistique_create;
                }

                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueController::createAction',  '_route' => 'manu_statistique_create',);
            }
            not_manu_statistique_create:

            // manu_statistique_edit
            if (preg_match('#^/statistique/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_statistique_edit')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueController::editAction',));
            }

            // manu_statistique_update
            if (preg_match('#^/statistique/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_manu_statistique_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_statistique_update')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueController::updateAction',));
            }
            not_manu_statistique_update:

            // manu_statistique_delete
            if (preg_match('#^/statistique/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_manu_statistique_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'manu_statistique_delete')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueController::deleteAction',));
            }
            not_manu_statistique_delete:

        }

        // manu_eleve
        if (rtrim($pathinfo, '/') === '/user') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'manu_eleve');
            }

            return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserController::eleveAction',  '_route' => 'manu_eleve',);
        }

        // manu_tfe_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'manu_tfe_homepage');
            }

            return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\DefaultController::indexAction',  '_route' => 'manu_tfe_homepage',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\DefaultController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        if (0 === strpos($pathinfo, '/register')) {
            // register
            if ($pathinfo === '/register') {
                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserController::registerAction',  '_route' => 'register',);
            }

            // register_create
            if ($pathinfo === '/register/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_register_create;
                }

                return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserController::createAction',  '_route' => 'register_create',);
            }
            not_register_create:

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_redirect
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_admin_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
            }

            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',));
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            // sonata_admin_search
            if ($pathinfo === '/admin/search') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_route' => 'sonata_admin_search',);
            }

            // sonata_admin_retrieve_autocomplete_items
            if ($pathinfo === '/admin/core/get-autocomplete-items') {
                return array (  '_controller' => 'sonata.admin.controller.admin:retrieveAutocompleteItemsAction',  '_route' => 'sonata_admin_retrieve_autocomplete_items',);
            }

            if (0 === strpos($pathinfo, '/admin/manu/tfe')) {
                // admin_manu_tfe_role_list
                if ($pathinfo === '/admin/manu/tfe/role/list') {
                    return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\RoleAdminController::listAction',  '_sonata_admin' => 'manu.tfe.admin.role',  '_sonata_name' => 'admin_manu_tfe_role_list',  '_route' => 'admin_manu_tfe_role_list',);
                }

                if (0 === strpos($pathinfo, '/admin/manu/tfe/user')) {
                    // admin_manu_tfe_user_list
                    if ($pathinfo === '/admin/manu/tfe/user/list') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserAdminController::listAction',  '_sonata_admin' => 'manu.tfe.admin.user',  '_sonata_name' => 'admin_manu_tfe_user_list',  '_route' => 'admin_manu_tfe_user_list',);
                    }

                    // admin_manu_tfe_user_create
                    if ($pathinfo === '/admin/manu/tfe/user/create') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserAdminController::createAction',  '_sonata_admin' => 'manu.tfe.admin.user',  '_sonata_name' => 'admin_manu_tfe_user_create',  '_route' => 'admin_manu_tfe_user_create',);
                    }

                    // admin_manu_tfe_user_batch
                    if ($pathinfo === '/admin/manu/tfe/user/batch') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserAdminController::batchAction',  '_sonata_admin' => 'manu.tfe.admin.user',  '_sonata_name' => 'admin_manu_tfe_user_batch',  '_route' => 'admin_manu_tfe_user_batch',);
                    }

                    // admin_manu_tfe_user_edit
                    if (preg_match('#^/admin/manu/tfe/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_user_edit')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserAdminController::editAction',  '_sonata_admin' => 'manu.tfe.admin.user',  '_sonata_name' => 'admin_manu_tfe_user_edit',));
                    }

                    // admin_manu_tfe_user_delete
                    if (preg_match('#^/admin/manu/tfe/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_user_delete')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserAdminController::deleteAction',  '_sonata_admin' => 'manu.tfe.admin.user',  '_sonata_name' => 'admin_manu_tfe_user_delete',));
                    }

                    // admin_manu_tfe_user_show
                    if (preg_match('#^/admin/manu/tfe/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_user_show')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserAdminController::showAction',  '_sonata_admin' => 'manu.tfe.admin.user',  '_sonata_name' => 'admin_manu_tfe_user_show',));
                    }

                    // admin_manu_tfe_user_export
                    if ($pathinfo === '/admin/manu/tfe/user/export') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\UserAdminController::exportAction',  '_sonata_admin' => 'manu.tfe.admin.user',  '_sonata_name' => 'admin_manu_tfe_user_export',  '_route' => 'admin_manu_tfe_user_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/manu/tfe/niveau')) {
                    // admin_manu_tfe_niveau_list
                    if ($pathinfo === '/admin/manu/tfe/niveau/list') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\NiveauAdminController::listAction',  '_sonata_admin' => 'manu.tfe.admin.niveau',  '_sonata_name' => 'admin_manu_tfe_niveau_list',  '_route' => 'admin_manu_tfe_niveau_list',);
                    }

                    // admin_manu_tfe_niveau_create
                    if ($pathinfo === '/admin/manu/tfe/niveau/create') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\NiveauAdminController::createAction',  '_sonata_admin' => 'manu.tfe.admin.niveau',  '_sonata_name' => 'admin_manu_tfe_niveau_create',  '_route' => 'admin_manu_tfe_niveau_create',);
                    }

                    // admin_manu_tfe_niveau_batch
                    if ($pathinfo === '/admin/manu/tfe/niveau/batch') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\NiveauAdminController::batchAction',  '_sonata_admin' => 'manu.tfe.admin.niveau',  '_sonata_name' => 'admin_manu_tfe_niveau_batch',  '_route' => 'admin_manu_tfe_niveau_batch',);
                    }

                    // admin_manu_tfe_niveau_edit
                    if (preg_match('#^/admin/manu/tfe/niveau/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_niveau_edit')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\NiveauAdminController::editAction',  '_sonata_admin' => 'manu.tfe.admin.niveau',  '_sonata_name' => 'admin_manu_tfe_niveau_edit',));
                    }

                    // admin_manu_tfe_niveau_delete
                    if (preg_match('#^/admin/manu/tfe/niveau/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_niveau_delete')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\NiveauAdminController::deleteAction',  '_sonata_admin' => 'manu.tfe.admin.niveau',  '_sonata_name' => 'admin_manu_tfe_niveau_delete',));
                    }

                    // admin_manu_tfe_niveau_show
                    if (preg_match('#^/admin/manu/tfe/niveau/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_niveau_show')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\NiveauAdminController::showAction',  '_sonata_admin' => 'manu.tfe.admin.niveau',  '_sonata_name' => 'admin_manu_tfe_niveau_show',));
                    }

                    // admin_manu_tfe_niveau_export
                    if ($pathinfo === '/admin/manu/tfe/niveau/export') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\NiveauAdminController::exportAction',  '_sonata_admin' => 'manu.tfe.admin.niveau',  '_sonata_name' => 'admin_manu_tfe_niveau_export',  '_route' => 'admin_manu_tfe_niveau_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/manu/tfe/categorie')) {
                    // admin_manu_tfe_categorie_list
                    if ($pathinfo === '/admin/manu/tfe/categorie/list') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieAdminController::listAction',  '_sonata_admin' => 'manu.tfe.admin.categorie',  '_sonata_name' => 'admin_manu_tfe_categorie_list',  '_route' => 'admin_manu_tfe_categorie_list',);
                    }

                    // admin_manu_tfe_categorie_create
                    if ($pathinfo === '/admin/manu/tfe/categorie/create') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieAdminController::createAction',  '_sonata_admin' => 'manu.tfe.admin.categorie',  '_sonata_name' => 'admin_manu_tfe_categorie_create',  '_route' => 'admin_manu_tfe_categorie_create',);
                    }

                    // admin_manu_tfe_categorie_batch
                    if ($pathinfo === '/admin/manu/tfe/categorie/batch') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieAdminController::batchAction',  '_sonata_admin' => 'manu.tfe.admin.categorie',  '_sonata_name' => 'admin_manu_tfe_categorie_batch',  '_route' => 'admin_manu_tfe_categorie_batch',);
                    }

                    // admin_manu_tfe_categorie_edit
                    if (preg_match('#^/admin/manu/tfe/categorie/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_categorie_edit')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieAdminController::editAction',  '_sonata_admin' => 'manu.tfe.admin.categorie',  '_sonata_name' => 'admin_manu_tfe_categorie_edit',));
                    }

                    // admin_manu_tfe_categorie_delete
                    if (preg_match('#^/admin/manu/tfe/categorie/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_categorie_delete')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieAdminController::deleteAction',  '_sonata_admin' => 'manu.tfe.admin.categorie',  '_sonata_name' => 'admin_manu_tfe_categorie_delete',));
                    }

                    // admin_manu_tfe_categorie_show
                    if (preg_match('#^/admin/manu/tfe/categorie/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_categorie_show')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieAdminController::showAction',  '_sonata_admin' => 'manu.tfe.admin.categorie',  '_sonata_name' => 'admin_manu_tfe_categorie_show',));
                    }

                    // admin_manu_tfe_categorie_export
                    if ($pathinfo === '/admin/manu/tfe/categorie/export') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\CategorieAdminController::exportAction',  '_sonata_admin' => 'manu.tfe.admin.categorie',  '_sonata_name' => 'admin_manu_tfe_categorie_export',  '_route' => 'admin_manu_tfe_categorie_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/manu/tfe/question')) {
                    // admin_manu_tfe_question_list
                    if ($pathinfo === '/admin/manu/tfe/question/list') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionAdminController::listAction',  '_sonata_admin' => 'manu.tfe.admin.question',  '_sonata_name' => 'admin_manu_tfe_question_list',  '_route' => 'admin_manu_tfe_question_list',);
                    }

                    // admin_manu_tfe_question_create
                    if ($pathinfo === '/admin/manu/tfe/question/create') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionAdminController::createAction',  '_sonata_admin' => 'manu.tfe.admin.question',  '_sonata_name' => 'admin_manu_tfe_question_create',  '_route' => 'admin_manu_tfe_question_create',);
                    }

                    // admin_manu_tfe_question_batch
                    if ($pathinfo === '/admin/manu/tfe/question/batch') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionAdminController::batchAction',  '_sonata_admin' => 'manu.tfe.admin.question',  '_sonata_name' => 'admin_manu_tfe_question_batch',  '_route' => 'admin_manu_tfe_question_batch',);
                    }

                    // admin_manu_tfe_question_edit
                    if (preg_match('#^/admin/manu/tfe/question/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_question_edit')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionAdminController::editAction',  '_sonata_admin' => 'manu.tfe.admin.question',  '_sonata_name' => 'admin_manu_tfe_question_edit',));
                    }

                    // admin_manu_tfe_question_delete
                    if (preg_match('#^/admin/manu/tfe/question/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_question_delete')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionAdminController::deleteAction',  '_sonata_admin' => 'manu.tfe.admin.question',  '_sonata_name' => 'admin_manu_tfe_question_delete',));
                    }

                    // admin_manu_tfe_question_show
                    if (preg_match('#^/admin/manu/tfe/question/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_manu_tfe_question_show')), array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionAdminController::showAction',  '_sonata_admin' => 'manu.tfe.admin.question',  '_sonata_name' => 'admin_manu_tfe_question_show',));
                    }

                    // admin_manu_tfe_question_export
                    if ($pathinfo === '/admin/manu/tfe/question/export') {
                        return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\QuestionAdminController::exportAction',  '_sonata_admin' => 'manu.tfe.admin.question',  '_sonata_name' => 'admin_manu_tfe_question_export',  '_route' => 'admin_manu_tfe_question_export',);
                    }

                }

                // admin_manu_tfe_statistique_list
                if ($pathinfo === '/admin/manu/tfe/statistique/list') {
                    return array (  '_controller' => 'Manu\\TfeBundle\\Controller\\StatistiqueAdminController::listAction',  '_sonata_admin' => 'manu.tfe.admin.statistique',  '_sonata_name' => 'admin_manu_tfe_statistique_list',  '_route' => 'admin_manu_tfe_statistique_list',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
