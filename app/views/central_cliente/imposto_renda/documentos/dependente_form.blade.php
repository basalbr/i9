<div class="form-section">
    <h4>Dependente</h4>
    <p>Complete os dados abaixo com as informações solicitadas.<br/><strong>Campos com * são obrigatórios.</strong></p>
    <br />
    <div class="form-group">
        <label class="col-md-3 label-control">Tipo de Dependente<b>*</b></label>
        <div class="col-md-9">
            <select name="tipo_dependente" class="form-control">
                @foreach(TipoDependente::all() as $tipo)
                    <option title="{{$tipo->descricao}}" value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control">Nome<b>*</b></label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Digite o nome do dependente" name="nome"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control">Data de Nascimento<b>*</b></label>
        <div class="col-md-9">
            <input type="text" name="data_nascimento" placeholder="Informe a data de nascimento do dependente" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control">CPF</label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button"><span class="fa fa-upload"></span> Enviar Documento
            </button>
            <input type="file" class="auto-load-file" name="cpf"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control">RG</label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button"><span class="fa fa-upload"></span> Enviar Documento
            </button>
            <input type="file" class="auto-load-file" name="rg"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>
</div>
<div class="form-section">
    <h4>Rendimentos</h4>
    <p>Deve ser enviado documento comprobatório do dependente dos valores recebidos
        em {{$ano_anterior}}</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Selecione o tipo de documento</label>
        <div class="col-md-9">
            <select class="form-control" name="rendimentos[descricao]">
                <option value="Rendimentos Recebidos de Pessoa Física ou Exterior">Rendimentos Recebidos de Pessoa
                    Física ou
                    Exterior
                </option>
                <option value="Rendimentos Recebidos de Pessoa Jurídica">Rendimentos Recebidos de Pessoa Jurídica
                </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button" data-tipo="rendimentos"><span class="fa fa-upload"></span>
                Enviar Documento
            </button>
            <input type="file" class="anexar" name="rendimentos[documento]"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>

    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_rendimentos">
        <tr class="nenhum">
            <td colspan="2">Nenhum rendimento declarado</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Rendimentos Isentos e Não Tributáveis</h4>
    <p>Deve ser enviado documento comprobatório, do dependente, dos valores recebidos
        em {{$ano_anterior}}</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Selecione o tipo de documento</label>
        <div class="col-md-9">
            <select class="form-control" name="rendimentos_isentos[descricao]">
                <option value="Indenização por rescisão do contrato de trabalho e FGTS">Indenização por rescisão do
                    contrato
                    de
                    trabalho e FGTS
                </option>
                <option value="Lucros e Dividendos recebidos">Lucros e Dividendos recebidos</option>
                <option value="Aposentadoria">Aposentadoria</option>
                <option value="Rendimentos de Caderneta de Poupança">Rendimentos de Caderneta de Poupança</option>
                <option value="Doações e Heranças">Doações e Heranças</option>
                <option value="Bolsa de Estudos">Bolsa de Estudos</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button" data-tipo="rendimentos_isentos"><span
                        class="fa fa-upload"></span> Enviar Documento
            </button>
            <input type="file" class="anexar" name="rendimentos_isentos[documento]"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>

    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_rendimentos_isentos">
        <tr class="nenhum">
            <td colspan="2">Nenhum rendimento declarado</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Rendimentos Sujeitos a Tributação Exclusiva</h4>
    <p>Deve ser enviado documento comprobatório do dependente, dos valores recebidos em {{$ano_anterior}}</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Selecione o tipo de documento</label>
        <div class="col-md-9">
            <select class="form-control" name="tributacao_exclusiva[descricao]">
                <option value="13º Salário">13º Salário
                </option>
                <option value="Rendimento de Aplicação Financeira">Rendimento de Aplicação Financeira</option>
                <option value="Aposentadoria">Lucros e Dividendos recebidos</option>
                <option value="Juros sobre capital próprio">Juros sobre capital próprio</option>
                <option value="Participação nos lucros ou Resultados">Participação nos lucros ou Resultados</option>
                <option value="Venda de bens e direitos">Venda de bens e direitos</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button" data-tipo="tributacao_exclusiva"><span
                        class="fa fa-upload"></span> Enviar Documento
            </button>
            <input type="file" class="anexar" name="tributacao_exclusiva[documento]"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>


    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_tributacao_exclusiva">
        <tr class="nenhum">
            <td colspan="2">Nenhum rendimento declarado</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Recibos - Dedutíveis</h4>
    <p>Deve ser enviado documento comprobatório do dependente, dos valores recebidos em {{$ano_anterior}}</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Selecione o tipo de documento</label>
        <div class="col-md-9">
            <select class="form-control" name="recibo_dedutiveis[descricao]">
                <option value="Instrução">Instrução</option>
                <option value="Fonoaudiólogos">Fonoaudiólogos</option>
                <option value="Médicos">Médicos</option>
                <option value="Dentista">Dentista</option>
                <option value="Psicólogos">Psicólogos</option>
                <option value="Fisioterapeutas">Fisioterapeutas</option>
                <option value="Hospitais, Clínicas e Laboratórios">Hospitais, Clínicas e Laboratórios</option>
                <option value="Plano de Saúde">Plano de Saúde</option>
                <option value="Pensão Alimentícia">Pensão Alimentícia</option>
                <option value="Previdência Complementar">Previdência Complementar</option>
                <option value="Advogados">Advogados</option>
                <option value="Engenheiros">Engenheiros</option>
                <option value="Aluguéis de Imóveis">Aluguéis de Imóveis</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button" data-tipo="recibo_dedutiveis"><span
                        class="fa fa-upload"></span> Enviar Documento
            </button>
            <input type="file" class="anexar" name="recibo_dedutiveis[documento]"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>

    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_recibo_dedutiveis">
        <tr class="nenhum">
            <td colspan="2">Nenhum rendimento declarado</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Doações Efetuadas</h4>
    <p>Enviar documento comprobatório de doações efetuadas pelo dependente no ano de {{$ano_anterior}}</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Valor da Doação</label>
        <div class="col-md-9">
            <div class="input-group"><span class="input-group-addon">$</span>
                <input type="text" value="" name="doacao[descricao]" class="form-control money-mask"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control">Cópia de CPF e RG para quem foi feita a doação</label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button"  data-tipo="doacao"><span class="fa fa-upload"></span> Enviar Documento</button>
            <input type="file" class="anexar" name="doacao[documento]"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>
    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Doações declaradas</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_doacao">
        <tr class="nenhum">
            <td colspan="2">Nenhuma doação declarada</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Bens e Direitos</h4>
    <p class="declaracao-ano-anterior-group">Enviar apenas as variações dos bens e direitos adquiridos ou extintos em {{$ano_anterior}}.</p>
    <p class="documentos-declaracao" style="display:none;">Enviar documento comprobatório dos bens em posse, vendidos e adquiridos em {{$ano_anterior}} pelo dependente.</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Selecione o tipo de documento</label>
        <div class="col-md-9">
            <select class="form-control" name="bens_direitos[descricao]">
                <option value="Imóveis">Imóveis</option>
                <option value="Contas bancárias, corrente, poupança, aplicação, investimento, etc">Contas bancárias, corrente, poupança, aplicação, investimento, etc</option>
                <option value="Veículos">Veículos</option>
                <option value="Embarcações">Embarcações</option>
                <option value="Dinheiro em espécie">Dinheiro em espécie</option>
                <option value="Participação em empresas">Participação em empresas</option>
                <option value="Empréstimos a receber">Empréstimos a receber</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button" data-tipo="bens_direitos"><span class="fa fa-upload"></span>
                Enviar Documento
            </button>
            <input type="file" name="bens_direitos[documento]" class="anexar"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>

    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_bens_direitos">
        <tr class="nenhum">
            <td colspan="2">Nenhuma declaração de bens e direitos enviada.</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Dívidas e Ônus Reais</h4>
    <p>Enviar documento comprobatório das dívidas correntes, realizadas e findadas no ano de {{$ano_anterior}} pelo dependente.</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Selecione o tipo de documento</label>
        <div class="col-md-9">
            <select class="form-control" name="dividas_onus[descricao]">
                <option value="Empréstimos bancários">Empréstimos bancários</option>
                <option value="Empréstimos Pessoa Física">Empréstimos Pessoa Física</option>
                <option value="Empréstimos Pessoa Jurídica">Empréstimos Pessoa Jurídica</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button" data-tipo="dividas_onus"><span class="fa fa-upload"></span>
                Enviar Documento
            </button>
            <input type="file" name="dividas_onus[documento]" class="anexar"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>

    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_dividas_onus">
        <tr class="nenhum">
            <td colspan="2">Nenhum documento enviado</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Doações a Partidos Políticos</h4>
    <p>Enviar documento comprobatório das doações realizadas pelo dependente em {{$ano_anterior}}</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Selecione o tipo de documento</label>
        <div class="col-md-9">
            <select class="form-control" name="doacoes_partidos_politicos[descricao]">
                <option value="Doações a Partidos Políticos - Recibo com CNPJ">Recibo com CNPJ</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button class="btn btn-primary upload-button" data-tipo="doacoes_partidos_politicos"><span
                        class="fa fa-upload"></span> Enviar Documento
            </button>
            <input type="file" name="doacoes_partidos_politicos[documento]" class="anexar"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>

    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_doacoes_partidos_politicos">
        <tr class="nenhum">
            <td colspan="2">Nenhum documento enviado</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="form-section">
    <h4>Outros</h4>
    <p>Anexe demais documentos de variação patrimonial que tenha incorrido em {{$ano_anterior}}</p>
    <div class="form-group">
        <label class="col-md-3 label-control">Descrição do documento</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="outros[descricao]"
                   placeholder="Digite uma descrição para o documento"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 label-control"></label>
        <div class="col-md-9">
            <button type="button" class="btn btn-primary upload-button" data-tipo="outros"><span class="fa fa-upload"></span> Enviar
                Documento
            </button>
            <input type="file" name="outros[documento]" class="anexar"/>
            <p class="help-block">Formatos aceitos: .pdf .jpeg .png. Tamanho Máximo: 10MB</p>
        </div>
    </div>

    <table class="table  table-striped table-hover">
        <thead>
        <tr>
            <th>Documentos enviados</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="lista_outros">
        <tr class="nenhum">
            <td colspan="2">Nenhum documento enviado</td>
        </tr>
        </tbody>
    </table>
</div>