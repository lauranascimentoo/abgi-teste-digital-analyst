<div class="container" style="padding: 20px; background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
    <h2 style="margin-bottom: 20px; color: #3F51B5; text-align: center; font-weight: 600; font-size: 2.2em; text-transform: uppercase;">Lista de Softwares</h2>

    <button wire:click="$toggle('showForm')" style="margin-bottom: 20px; padding: 8px 15px; background-color: #5C6BC0; color: white; border: none; border-radius: 6px; cursor: pointer; transition: background-color 0.2s ease;" onmouseover="this.style.backgroundColor='#4E5AA8'" onmouseout="this.style.backgroundColor='#5C6BC0'">
        Novo
    </button>

    <form wire:submit.prevent="buscar" class="d-flex mb-3" style="gap: 20px; align-items: center;">
    <input type="text" wire:model="search" placeholder="Buscar por nome..." class="form-control">

    <select wire:model="filterStatus" class="form-control" style="width: 200px;">
        <option value="">Todos os status</option>
        <option value="1">Ativo</option>
        <option value="0">Inativo</option>
    </select>

    <button type="submit" class="btn btn-primary">
        🔍
    </button>

    <div style="margin-left: auto; display: flex; gap: 10px; align-items: center; border: 1px solid #dee2e6; padding: 8px 12px; border-radius: 6px;">
        <button type="button" wire:click="limparBusca" class="btn btn-secondary">
            Limpar Filtro
        </button>
        <select wire:model="perPage" class="form-control" style="width: 120px; margin-bottom: 0;">
            <option value="10">10 por página</option>
            <option value="25">25 por página</option>
            <option value="50">50 por página</option>
        </select>
    </div>

    </form>


    @if($showForm)
        <div class="mb-4 p-4 border rounded bg-gray-100" style="background-color: #fff; border: 1px solid #e0e0e0;">
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

                <button type="submit" style="padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 6px; cursor: pointer; transition: background-color 0.2s ease;" onmouseover="this.style.backgroundColor='#43A047'" onmouseout="this.style.backgroundColor='#4CAF50'">
                    Salvar
                </button>
            </form>
        </div>
    @endif

    <table class="table table-bordered table-striped" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #E8EAF6; color: #3F51B5; text-transform: uppercase; font-size: 0.9em;">
                <th style="text-align: center; padding-top: 12px; padding-bottom: 12px; border-right: 1px solid #d1d9e1; border-bottom: 1px solid #d1d9e1;">ID</th>
                <th style="text-align: center; padding-top: 12px; padding-bottom: 12px; border-right: 1px solid #d1d9e1; border-bottom: 1px solid #d1d9e1;">Nome</th>
                <th style="text-align: center; padding-top: 12px; padding-bottom: 12px; border-right: 1px solid #d1d9e1; border-bottom: 1px solid #d1d9e1;">Versão</th>
                <th style="text-align: center; padding-top: 12px; padding-bottom: 12px; border-right: 1px solid #d1d9e1; border-bottom: 1px solid #d1d9e1;">Status</th>
                <th style="text-align: center; padding-top: 12px; padding-bottom: 12px; border-right: 1px solid #d1d9e1; border-bottom: 1px solid #d1d9e1;">Download</th>
                <th style="text-align: center; padding-top: 12px; padding-bottom: 12px; border-bottom: 1px solid #d1d9e1;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($softwares as $software)
                <tr>
                    <td style="text-align: center; padding-top: 10px; padding-bottom: 10px; border-right: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0;">{{ $software->id }}</td>
                    <td style="text-align: center; padding-top: 10px; padding-bottom: 10px; border-right: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0;">{{ $software->nome }}</td>
                    <td style="text-align: center; padding-top: 10px; padding-bottom: 10px; border-right: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0;">{{ $software->versao }}</td>
                    <td style="text-align: center; padding-top: 10px; padding-bottom: 10px; border-right: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0;">{{ $software->status ? 'Ativo' : 'Inativo' }}</td>
                    <td style="text-align: center; padding-top: 10px; padding-bottom: 10px; border-right: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0;">
                        @if($software->download_url)
                            <a href="{{ $software->download_url }}" target="_blank" style="color: blue; text-decoration: underline;">Link</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td style="text-align: center; padding-top: 10px; padding-bottom: 10px; border-bottom: 1px solid #e0e0e0;">
                        <button wire:click="edit({{ $software->id }})" style="padding: 5px 10px; background-color: #CFD8DC; color: #37474F; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9em; margin-right: 5px; transition: background-color 0.2s ease;" onmouseover="this.style.backgroundColor='#B0BEC5'" onmouseout="this.style.backgroundColor='#CFD8DC'">
                            ✏️ Editar
                        </button>
                        <button wire:click="confirmDelete({{ $software->id }})" style="padding: 5px 10px; background-color: #FFCDD2; color: #B71C1C; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9em; transition: background-color 0.2s ease;" onmouseover="this.style.backgroundColor='#EF9A9A'" onmouseout="this.style.backgroundColor='#FFCDD2'">
                            🗑️ Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 15px; border-bottom: 1px solid #e0e0e0;">Nenhum software cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 15px;">
    {{ $softwares->links() }}
    </div>

    @if($confirmingDelete)
        <div style="position: fixed; top: 0; left: 0; width:100%; height:100%; background-color: rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; z-index: 1000;">
            <div style="background: white; padding: 20px; margin-top: 40px; border-radius: 8px; width: 320px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                <p style="font-size: 1.1em; color: #333; margin-top: 0; margin-bottom: 15px; font-weight: 500;">Tem certeza que deseja excluir este item?</p>
                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                    <button wire:click="delete" style="padding: 7px 14px; background-color: #D32F2F; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.2s ease;" onmouseover="this.style.backgroundColor='#C62828'" onmouseout="this.style.backgroundColor='#D32F2F'">
                        Confirmar
                    </button>
                    <button wire:click="$set('confirmingDelete', false)" style="padding: 7px 14px; background-color: #757575; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.2s ease;" onmouseover="this.style.backgroundColor='#616161'" onmouseout="this.style.backgroundColor='#757575'">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div wire:loading style="color: #5C6BC0; font-weight: bold; text-align: center; padding: 10px;">
        Carregando...
    </div>
</div>