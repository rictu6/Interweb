

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_ors')): ?>
    <form method="POST" action="<?php echo e(route('admin.orsheaders.destroy',$ors['ors_hdr_id'])); ?>"  class="d-inline">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger btn-sm delete_ors">
            <i class="fa fa-trash"></i>
        </button>
    </form>
<?php endif; ?>
<?php /**PATH C:\laragon\www\Interweb\resources\views/admin/orsheaders/_action.blade.php ENDPATH**/ ?>