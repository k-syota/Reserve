<div style="text-align: center">

    <form action="" wire:submit.prevent="register">

        @error('name')
            <div class="text-red-400">{{ $message }}</div>
        @enderror
        <label for="name">name</label>
        <input type="text" id="name" wire:model.lazy="name"><br>

        @error('email')
            <div class="text-red-400">{{ $message }}</div>
        @enderror
        <label for="email">email</label>
        <input type="email" id="email" wire:model.lazy="email"><br>

        @error('password')
            <div class="text-red-400">{{ $message }}</div>
        @enderror
        <label for="password">password</label>
        <input type="password" id="password" wire:model="password"><br>

        <button>登録</button>
    </form>
</div>
