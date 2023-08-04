
<div class="form-group">
    <div class="row">
        <div class="col-lg-12">
        <label for="budget_year"><?php echo e(__('Budget Year')); ?></label>
        <select   name="budget_year" id="budget_year"
        class="form-control">
          <option value="">Budget Year</option>
            <option value="2023">2023</option>
             <option value="2022">2022</option>
             </select>
      </div>
      <div class="col-lg-12">
        <label for="budget_type"><?php echo e(__('Authorization')); ?></label>
        <select  class="form-control" name="budget_type" id="budget_type">
            <?php if(isset($saro)&&isset($ors['budgettype'])): ?>
            <option value="<?php echo e($saro['budgettype']['budget_type_id']); ?>" selected> <?php echo e($saro['budgettype']['description']); ?>

              </option>
              <?php endif; ?>
        </select>
      </div>
      <div class="col-lg-12">
        <label for="month"><?php echo e(__('Month')); ?></label>
        <select   name="month" id="month"
        class="form-control">
          <option value="">Month</option>
            <option value="1">January</option>
             <option value="2">February</option>
             <option value="3">March</option>
             <option value="4">April</option>
             <option value="5">May</option>
             <option value="6">June</option>
             <option value="7">July</option>
             <option value="8">August</option>
             <option value="9">September</option>
             <option value="10">October</option>
             <option value="11">November</option>
             <option value="12">Decemberr</option>
             </select>
      </div>
      <div class="col-lg-12">
    <label for="sub_allotment_no"><?php echo e(__('Sub-Allotment')); ?></label>
        <input type="text" class="form-control" name="sub_allotment_no" placeholder="<?php echo e(__('Sub-Allotment No')); ?>"  required>
      </div>



  <div class="col-lg-12">
        

    <label for="fund_source_id"><?php echo e(__('Fund Source')); ?></label>
    <select  class="form-control" name="fund_source_id" id="fund_source_id">
        <?php if(isset($saro)&&isset($saro['fundsource'])): ?>
        <option value="<?php echo e($saro['fundsource']['fund_source_id']); ?>" selected><?php echo e($saro['fundsource']['code']); ?> - <?php echo e($saro['fundsource']['description']); ?>

          </option>
          <?php endif; ?>
    </select>
  </div>
  <div class="col-lg-12">
    <label for="pap_id"><?php echo e(__('PAP')); ?></label>
    <select  class="form-control" name="pap_id" id="pap_id">
        <?php if(isset($saro)&&isset($saro['pap'])): ?>
        <option value="<?php echo e($saro['pap']['pap_id']); ?>" selected><?php echo e($saro['pap']['code']); ?> - <?php echo e($saro['pap']['description']); ?>

          </option>
          <?php endif; ?>
    </select>
   </div>
   <div class="col-lg-12">
    <div class="form-group">
         <label for="remarks"><?php echo e(__('Purpose')); ?></label>

         <textarea name="remarks" id="remarks" rows="3" class="form-control" placeholder="<?php echo e(__('Purpose')); ?>"><?php echo e(old('remarks')); ?></textarea>

        </div>
</div>

</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><?php echo e(__('UACS')); ?></h3>
                <ul class="list-style-none">
                    <li class="d-inline float-right">
                        <button type="button" class="btn btn-primary btn-sm add_component">
                            <i class="fa fa-plus"></i>
                            <?php echo e(__('Add UACS')); ?>

                        </button>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                        <table class="table table-striped table-bordered table-hover components" width="100%">
                            <thead class="btn-primary">
                                <th width="400px"><?php echo e(__('UACS')); ?></th>
                                <th width="100px"><?php echo e(__('Allotment Received')); ?></th>
                                <th width="10px"><?php echo e(__('Action')); ?></th>
                            </thead>
                            <tbody class="items">
                                <?php
                                  $count=0;
                                  $option_count=0;
                                ?>
                                <?php if(isset($saro)): ?>
                                
                                    <?php $__currentLoopData = $saro['approdtls']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <?php
                                            $count++;
                                        ?>
                                        
                                        <tr dtl_id="<?php echo e($detail['appro_dtl_id']); ?>" >
                                            
                                                <td>
                                                    <div class="form-group">
                                                        
                                                        <input type="hidden" id="count" value="<?php echo e($count); ?>">
                                                        <select  class="form-control" name="approdtls[0][uacs_subobject_code]" id="uacs_subobject_code">
                                                            <?php if(isset($saro)&&isset($saro['approdtls'])): ?>
                                                            <option value="<?php echo e($saro['approdtls']['uacs_subobject_code']); ?>" selected><?php echo e($saro['approdtls']['uacs_subobject_code']); ?>

                                                              </option>
                                                              <?php endif; ?>
                                                        </select>
                                                      </div>
                                                </td>
                                                <td>
                                               <div class="form-group">
                                                <div class="input-group-append">
                                                                    <input type="number" class="form-control" name="approdtls[0][allotment_received]"  min="0" class="allotment_received" required>
                                                                        <span class="input-group-text">
                                                                            <?php echo e(get_currency()); ?>

                                                                        </span>
                                                                        </div>
                                                            </div>
                                                        </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete_row">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
<input type="hidden" name="" id="count" value="<?php echo e($count); ?>">
<input type="hidden" name="" id="option_count" value="<?php echo e($option_count); ?>">

<?php /**PATH C:\laragon\www\Interweb\resources\views/admin/suballotments/_form_suballotment.blade.php ENDPATH**/ ?>