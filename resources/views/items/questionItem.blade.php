<div class="row question">
    <div class="description">
        <h4 class="email">{{ $question->email }}</h4>
        <p class="text">{{ $question->question }}</p>
    </div>
        <form action="{{ route('question.destroy', $question) }}" method="post" class="text-center">
            @csrf
            @method("delete")
            <button class="btn btnConfirmQuestion" type="submit"><i class="fas fa-check"></i></button>
        </form>
</div>
