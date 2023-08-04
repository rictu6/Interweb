<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_dashboard')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.index')); ?>" class="nav-link" id="dashboard">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    <?php echo e(__('MY DASHBOARD')); ?>

                </p>
            </a>
        </li>
        <?php endif; ?>





        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['view_profile','view_profileaccount'])): ?>
        <li class="nav-item has-treeview" id="users_profiles">
            <a href="#" class="nav-link" id="users_profiles_link">
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                    <?php echo e(__('MY ACCOUNT PROFILE')); ?>

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_profile')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.profile.edit')); ?>" class="nav-link" id="profiles">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('MY PROFILE')); ?></p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_profileaccount')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.profileaccount.edit')); ?>" class="nav-link" id="profileaccounts">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('MY ACCOUNT')); ?></p>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_branch')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.branches.index')); ?>" class="nav-link" id="branches">
                <i class="fas fa-map-marked-alt nav-icon"></i>
                <p><?php echo e(__('Branches')); ?></p>
            </a>
        </li>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['view_hrmis','view_user','view_fta','view_legal'])): ?>
        <li class="nav-item has-treeview" id="users_roles">
            <a href="#" class="nav-link" id="users_roles_link">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    <?php echo e(__('MY APPLICATION')); ?>

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_user')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link" id="users">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('USER MANAGEMENT')); ?></p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_hrmis')): ?>
                <li class="nav-item">

                        <a href="http://hrmis.region6.dilg.gov.ph" target="_blank" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('HRMIS')); ?>

                            </p>


                        </a>

                </li>
                <?php endif; ?>
                
                <li class="nav-item">

                        <a href="https://pms.region6.dilg.gov.ph/" target="_blank" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p><?php echo e(__('PMS')); ?>

                            </p>


                        </a>

                </li>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_fta')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.ftas.index')); ?>" class="nav-link" id="ftas">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('FOREIGN TRAVEL AUTHORITY')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>


                <li class="nav-item">
                    
                    <a href="#" class="nav-link" id="legalopinion">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('LEGAL OPINION')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_legal_dash')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.files.index')); ?>" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p><?php echo e(__('DASHBOARD')); ?>

                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_legal')): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.file_list')); ?>" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p><?php echo e(__('INITIATE LEGAL')); ?>

                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>

                  
                  <li class="nav-item">
                    <a href="#" class="nav-link" id="schedule">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('SCHEDULE')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.schedules.index')); ?>" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p><?php echo e(__('DASHBOARD')); ?>

                                </p>
                            </a>
                        </li>
                        

                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.schedule_list')); ?>" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                <p><?php echo e(__('PLAN A SCHEDULE')); ?>

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">

                                <a href="<?php echo e(route('admin.calendar_show')); ?>" class="nav-link">
                                <i class="far fa-square nav-icon"></i>
                                
                                <p><?php echo e(__('CALENDAR')); ?>

                                </p>
                            </a>
                        </li>
                        

                       
                    </ul>









                </li>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_orsheader','view_dvreceive')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orsheaders.index')); ?>" class="nav-link" id="orsheaders">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('FUND DISBURSEMENT MONITORING SYSTEM')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

                




            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['view_division','view_filecategory','view_role','view_empstatus','view_muncit','view_office','view_position','view_section','view_province'])): ?>
        <li class="nav-item has-treeview" id="maintenance">
            <a href="#" class="nav-link" id="maintenance_link">
                <i class="fa fa-cogs nav-icon"></i>
                <p>
                    <?php echo e(__('MY MAINTENANCE')); ?>

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_division')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.divisions.index')); ?>" class="nav-link" id="divisions">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('DIVISIONS')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_position')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.positions.index')); ?>" class="nav-link" id="positions">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('POSITIONS')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_office')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.offices.index')); ?>" class="nav-link" id="offices">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('OFFICES')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_empstatus')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.empstatuss.index')); ?>" class="nav-link" id="empstatuss">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('EMPLOYEE STATUS')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_muncit')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.muncits.index')); ?>" class="nav-link" id="muncits">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('MUNICIPALITY')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_province')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.provinces.index')); ?>" class="nav-link" id="provinces">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('PROVINCE')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_section')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.sections.index')); ?>" class="nav-link" id="sections">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('SECTION')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_filecategory')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.filecategories.index')); ?>" class="nav-link" id="filecategories">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('FILE CATEGORIES')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>


            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_doctor')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.doctors.index')); ?>" class="nav-link" id="doctors">
                <i class="nav-icon fa fa-user-md"></i>
                <p>
                    <?php echo e(__('Doctors')); ?>

                </p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['view_test_prices','view_culture_prices'])): ?>
        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    <?php echo e(__('Price List')); ?>

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_test_prices')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.prices.tests')); ?>" class="nav-link" id="tests_prices">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('Tests')); ?></p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_culture_prices')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.prices.cultures')); ?>" class="nav-link" id="cultures_prices">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('Cultures')); ?></p>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_contract')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.contracts.index')); ?>" class="nav-link" id="contracts">
                <i class="fas fa-file-contract nav-icon"></i>
                <p><?php echo e(__('Contracts')); ?></p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_patient')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.patients.index')); ?>" class="nav-link" id="patients">
                <i class="nav-icon fas fa-user-injured"></i>
                <p>
                    <?php echo e(__('Patients')); ?>

                </p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_visit')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.visits.index')); ?>" class="nav-link" id="visits">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    <?php echo e(__('Home Visits')); ?>

                </p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_group')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.groups.index')); ?>" class="nav-link" id="groups">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    <?php echo e(__('Group Tests')); ?>

                </p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_report')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.reports.index')); ?>" class="nav-link" id="reports">
                <i class="nav-icon fas fa-flag"></i>
                <p>
                    <?php echo e(__('Reports')); ?>

                </p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_chat')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.chat.index')); ?>" class="nav-link" id="chat">
                <i class="nav-icon far fa-comment-dots"></i>
                <p>
                    <?php echo e(__('Chat')); ?>

                </p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['view_accounting_reports','view_expense','view_expense_category'])): ?>
        <li class="nav-item has-treeview" id="accounting">
            <a href="#" class="nav-link" id="accounting_link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                    <?php echo e(__('Accounting')); ?>

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_expense_category')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.expense_categories.index')); ?>" class="nav-link" id="expense_categories">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            <?php echo e(__('Expense Categories')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_expense')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.expenses.index')); ?>" class="nav-link" id="expenses">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            <?php echo e(__('Expenses')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_accounting_reports')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.accounting.index')); ?>" class="nav-link" id="accounting_reports">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            <?php echo e(__('Accounting Report')); ?>

                        </p>
                    </a>
                </li>

                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?>



        


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['view_role','view_module','view_permission'])): ?>
        <li class="nav-item has-treeview" id="authorization">
            <a href="#" class="nav-link" id="authorization_link">
                <i class="nav-icon fas fa-lock"></i>
                <p>
                    <?php echo e(__('MY AUTHORIZATION')); ?>

                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_role')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.roles.index')); ?>" class="nav-link" id="roles">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('ROLES')); ?></p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_module')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.modules.index')); ?>" class="nav-link" id="modules">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('MODULES')); ?></p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_permission')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.permissions.index')); ?>" class="nav-link" id="permissions">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo e(__('PERMISSIONS')); ?></p>
                    </a>
                </li>
                <?php endif; ?>


            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_setting')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.settings.index')); ?>" class="nav-link" id="settings">
                <i class="fa fa-cogs nav-icon"></i>
                <p><?php echo e(__('Settings')); ?></p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_translation')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.translations.index')); ?>" class="nav-link" id="translations">
                <i class="fa fa-book nav-icon"></i>
                <p><?php echo e(__('Translations')); ?></p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_activity_log')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.activity_logs.index')); ?>" class="nav-link" id="activity_logs">
                <i class="fa fa-server nav-icon"></i>
                <p><?php echo e(__('Activity Logs')); ?></p>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_backup')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('admin.backups.index')); ?>" class="nav-link" id="backups">
                <i class="fa fa-database nav-icon"></i>
                <p><?php echo e(__('Database Backups')); ?></p>
            </a>
        </li>
        <?php endif; ?>
        





        <li class="nav-item">
            <a href="#" class="nav-link"  role="button" onclick="document.getElementById('sign_out').submit();" >
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    <?php echo e(__('LOGOUT')); ?>

                </p>
            </a>
              <form id="sign_out" method="POST" action="<?php echo e(route('admin.logout')); ?>">
                <?php echo csrf_field(); ?>
              </form>
        </li>








    </ul>
</nav>
<?php /**PATH C:\laragon\www\Interweb\resources\views/partials/admin_sidebar.blade.php ENDPATH**/ ?>