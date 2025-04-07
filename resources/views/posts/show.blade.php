@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <h3>{{ $post->titulo }}</h3>
        </div>
        <div class="card-body">
            <p>{{ $post->contenido }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            @auth
                <div>
                    <button id="like-btn" class="btn btn-sm"
                        data-liked="{{ $post->likes->contains('user_id', auth()->id()) ? '1' : '0' }}"
                        data-post-id="{{ $post->id }}">
                        {{ $post->likes->contains('user_id', auth()->id()) ? '💔 Quitar Like' : '❤️ Me gusta' }}
                    </button>
                    <span id="like-count">{{ $post->likes->count() }}</span> likes
                </div>
            @else
                <p class="text-muted">Inicia sesión para dar like</p>
            @endauth
        </div>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    <h5 class="mt-4">Comentarios</h5>
        @forelse ($post->comentarios as $comentario)
            <div class="border p-2 mb-2">
                <strong>{{ $comentario->user->name }}:</strong>
                <p>{{ $comentario->contenido }}</p>
                <small class="text-muted">{{ $comentario->      created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p>No hay comentarios aún.</p>
        @endforelse

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const likeBtn = document.getElementById('like-btn');
        const likeCount = document.getElementById('like-count');

        if (likeBtn) {
            likeBtn.addEventListener('click', function () {
                const postId = this.dataset.postId;
                const liked = this.dataset.liked === '1';
                const url = `/posts/${postId}/like`;
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(url, {
                    method: liked ? 'DELETE' : 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                })
                .then(res => {
                    if (!res.ok) throw new Error('Error al procesar el like');
                    return res.json();
                })
                .then(data => {
                    this.dataset.liked = liked ? '0' : '1';
                    this.textContent = liked ? '❤️ Me gusta' : '💔 Quitar Like';
                    likeCount.textContent = data.likes;
                })
                .catch(err => console.error(err));
            });
        }
    });
</script>
@endpush
