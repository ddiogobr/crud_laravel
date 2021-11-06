<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{_('Agenda') }}
                    <a href="{{ route("home") }} type="button" class="float-right btn btn-secondary">Voltar</a>
                </div>

                <div class="card body">
                    {!! Form::open(['class' => 'row g-3', 'name => 'form', 'route' =>['agenda.atualizar', $agenda->id], 'method'=>'put'])!!}}
                        @csrf
                        @method('PUT')
                        <div class ="col-md-6">
                            <label for="descrições" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descrições" name="descrições" value="{{ $agenda->descrições }}">
                        </div>
                        <div class="col-md-6">
                            <label for="data_planejada" class="form-label">Data Planejada</label>
                            <input type="date" class="form-control" id="data_planejada" value="{{ $agenda->data_planejada }}">
                        </div>
                        <div class="col-12" style="margin: 15px 0;">
                            <label for="observações" class="form-label">Observações</label>
                            <textarea class="form-control" name="observações" id="observações" rows="7">{{ $agenda->observações}}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>