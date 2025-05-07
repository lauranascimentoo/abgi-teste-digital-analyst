<div class="container" style="padding: 20px;">
    <h2 style="margin-bottom: 10px;">Lista de Softwares</h2>

    <button wire:click="$toggle('showForm')" style="margin-bottom: 10px; padding: 6px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px;">
        Novo
    </button>

    @if($showForm)
        <div class="mb-4 p-4 border rounded bg-gray-100">
            <form wire:submit.prevent="save">
                <div style="margin-bottom: 10px;">
                    <label>Nome:</label><br>
                    <input type="text" wire:model="nome" class="border p-1 w-full">
                    @error('nome') <div style="color: red;">{{ $message }}</div> @enderror
                </div>

                <div style="margin-bottom: 10px;">
                    <label>Versão:</label><br>
                    <input type="text" wire:model="versao" class="border p-1 w-full">
                    @error('versao') <div style="color: red;">{{ $message }}</div> @enderror
                </div>

                <div style="margin-bottom: 10px;">
                    <label>Status:</label><br>
                    <select wire:model="status" class="border p-1 w-full">
                        <option value="">Selecione</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                    @error('status') <div style="color: red;">{{ $message }}</div> @enderror
                </div>

                <div style="margin-bottom: 10px;">
                    <label>URL para Download:</label><br>
                    <input type="url" wire:model="download_url" class="border p-1 w-full">
                    @error('download_url') <div style="color: red;">{{ $message }}</div> @enderror
                </div>

                <button type="submit" style="padding: 6px 12px; background-color: #28a745; color: white; border: none; border-radius: 4px;">
                    Salvar
                </button>
            </form>
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f1f1f1;">
                <th>ID</th>
                <th>Nome</th>
                <th>Versão</th>
                <th>Status</th>
                <th>Download</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($softwares as $software)
                <tr>
                    <td>{{ $software->id }}</td>
                    <td>{{ $software->nome }}</td>
                    <td>{{ $software->versao }}</td>
                    <td>{{ $software->status ? 'Ativo' : 'Inativo' }}</td>
                    <td>
                        @if($software->download_url)
                            <a href="{{ $software->download_url }}" target="_blank">Download</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <button wire:click="edit({{ $software->id }})" style="padding: 4px 8px; background-color: #ffc107; color: black; border: none; border-radius: 4px;">
                            ✏️ Editar
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum software cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>