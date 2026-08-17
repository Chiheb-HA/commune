@props([
    'id' => 'confirmationModal',
    'title' => 'Confirm Action',
    'message' => 'Are you sure you want to proceed?',
    'confirmText' => 'Confirm',
    'cancelText' => 'Cancel',
    'confirmButtonClass' => 'btn-primary',
    'icon' => 'bi-exclamation-circle'
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi {{ $icon }}" style="font-size: 2rem; color: var(--primary);"></i>
                    </div>
                    <h5 class="modal-title fw-bold" id="{{ $id }}Label">{{ $title }}</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-0">{{ $message }}</p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 8px; font-weight: 500;">{{ $cancelText }}</button>
                <button type="button" class="btn {{ $confirmButtonClass }} confirm-action-btn" style="border-radius: 8px; font-weight: 600;">{{ $confirmText }}</button>
            </div>
        </div>
    </div>
</div>
