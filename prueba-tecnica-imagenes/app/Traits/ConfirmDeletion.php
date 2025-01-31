<?php
namespace App\Traits;

trait ConfirmDeletion
{
    public function confirmDelete($imageId)
    {
        return "if (confirm('¿Estás seguro de que quieres eliminar esta imagen? Esta acción no se puede deshacer.')) {
            document.getElementById('delete-form-' + {$imageId}).submit();
        }";
    }
}
