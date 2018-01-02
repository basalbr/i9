    <div class="modal fade" id="completa-simplificada-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Declaração completa ou simplificada</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Com base nos documentos enviados analisaremos a forma mais econômica para sua
                            declaração.<br/>Abaixo segue como funciona cada modalidade.</p>
                        <p><strong>Modelo Simplificado</strong></p>
                        <p>As declarações simplificadas podem ser feitas por qualquer contribuinte. Entretanto, nesse
                            modelo as deduções são substituídas por um desconto padrão de 20% sobre os rendimentos
                            tributáveis, desde que o desconto não ultrapasse o valor de R$ 11.167,20. </p>
                        <p><strong>Modelo Completo</strong></p>
                        <p>Caso você não se enquadre no modelo simplificado, ou seja, tem muitas deduções a fazer, como
                            plano de saúde, gastos com educação, dependentes etc., poderá declarar o imposto da maneira
                            completa, onde é necessário informar todos os gastos e rendimentos ocorridos no ano.<br/>
                            É necessário guardar todos os seus recibos e comprovantes de rendimentos.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="documentos-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Documentos a serem enviados</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Abaixo elaboramos uma lista com os principais documentos que deverão ser enviados, lembramos
                            que toda variação patrimonial, seja ela aumentando a quantidade de bens ou reduzindo, devem
                            ser informadas junto com os documentos que comprovem as operações.<br/>Caso tenha dúvidas de
                            como declarar, entre em contato conosco ou anexe em sua declaração no item "Outros" que
                            faremos a análise e lhe retornaremos explicando se será necessário ou não.</p>
                        <p><button id="imprimir-docs" class="hidden-print btn btn-complete"><span class="fa fa-print"></span> Imprimir Documentos</button></p>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Documento</th>
                                <th style="min-width: 350px">Declarante/Dependente</th>
                                <th>Obrigatório?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Recibo da Declaração de IR de 2016</td>
                                <td>Declarante</td>
                                <td><span class="fa fa-check text-primary"></span> *Caso possua</td>
                            </tr>
                            <tr>
                                <td>Declaração de IR de 2016</td>
                                <td>Declarante</td>
                                <td><span class="fa fa-check text-primary"></span> *Caso possua</td>
                            </tr>
                            <tr>
                                <td>CPF</td>
                                <td>Declarante e dependentes com mais de 14 anos</td>
                                <td><span class="fa fa-check text-primary"></span></td>
                            </tr>
                            <tr>
                                <td>RG</td>
                                <td>Declarante e dependentes com mais de 14 anos</td>
                                <td><span class="fa fa-check text-primary"></span></td>
                            </tr>
                            <tr>
                                <td>Título de Eleitor</td>
                                <td>Declarante</td>
                                <td><span class="fa fa-check text-primary"></span></td>
                            </tr>
                            <tr>
                                <td>Comprovante de Residência</td>
                                <td>Declarante</td>
                                <td><span class="fa fa-check text-primary"></span></td>
                            </tr>
                            <tr>
                                <td>Comprovante de Rendimentos Recebidos de Pessoa Jurídica</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Comprovante de Rendimentos Recebidos de Pessoa Física ou Exterior</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Indenização por rescisão do contrato de trabalho e FGTS</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Lucros e Dividendos recebidos</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Aposentadoria</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Rendimentos de Caderneta de Poupança</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Doações e Heranças Recebidos</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Bolsa de Estudos</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>13º Salário</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Juros sobre capital próprio</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Participação nos lucros ou Resultados</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Venda de bens e direitos</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Recibos com Instrução/Educação</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Recibos de Médicos</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Recibos de Dentistas</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Recibos de Plano de Saúde</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Pensão Alimentícia</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Previdência Complementar</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Advogados</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Engenheiros</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Aluguéis de Imóveis</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Imóveis</td>
                                <td>Declarante e dependentes</td>
                                <td>Caso informado na declaração anterior e permaneça inalterado, não haverá necessidade
                                    de enviar
                                </td>
                            </tr>
                            <tr>
                                <td>Contas Bancárias, corrente, poupança, aplicação, investimento</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Veículos</td>
                                <td>Declarante e dependentes</td>
                                <td>Caso informado na declaração anterior e permaneça inalterado, não haverá necessidade
                                    de enviar
                                </td>
                            </tr>
                            <tr>
                                <td>Embarcações</td>
                                <td>Declarante e dependentes</td>
                                <td>Caso informado na declaração anterior e permaneça inalterado, não haverá necessidade
                                    de enviar
                                </td>
                            </tr>
                            <tr>
                                <td>Dinheiro em espécie</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Participação em empresas</td>
                                <td>Declarante e dependentes</td>
                                <td>Caso informado na declaração anterior e permaneça inalterado, não haverá necessidade
                                    de enviar
                                </td>
                            </tr>
                            <tr>
                                <td>Empréstimos a receber</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Empréstimos bancários a pagar</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Empréstimos Pessoa Física</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>
                            <tr>
                                <td>Empréstimos Pessoa Jurídica</td>
                                <td>Declarante e dependentes</td>
                                <td><span class="fa fa-remove text-danger"></span></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer hidden-print">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="alerta-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Atenção!</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Certifique-se de estar com <strong>todos os documentos necessários</strong> digitalizados
                            antes de clicar em <strong>enviar declaração</strong>.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="data-envio-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data para envio</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        Ao cadastrar os documentos e nos enviar, sua declaração será realizada em 3 dias úteis.
                        Iniciando as transmissões a Receita Federal no dia 02 de março até 28 de abril.
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="valor-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Qual o valor?</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Nossa taxa de serviço é de R$ 70,00 referente a análise dos documentos e envio da declaração
                            do imposto de renda da pessoa física.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deduzir-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">O que posso deduzir?</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Os documentos que poderá utilizar para deduzir o valor do IR a pagar são:</p>
                        <ul>
                            <li>Pensão alimentícia;</li>
                            <li>Previdência Privada paga pelo declarante ou dependentes;</li>
                            <li>Despesas médicas do declarante e dependentes;</li>
                            <li>Despesas com instrução.</li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dividas-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Preciso declarar as dívidas?</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Sim, é necessário informar os passivos, sejam empréstimos bancários ou com pessoas físicas,
                            os valores a serem informados são o saldo inicial e final, sejam eles obtidos durante o ano
                            ou que tenham sido contraídos em anos anteriores e tenham sido mantidos ou quitados.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bens-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Quais bens devem ser declarados?</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Deverá ser informado na declaração todos os bens que estavam em posse do declarante e
                            dependentes no ano anterior, tendo eles sido adquiridos e/ou vendidos durante o ano. Toda
                            variação patrimonial deverá ser informada, mas os principais documentos são:</p>
                        <ul>
                            <li>Dinheiro em espécie em moeda nacional e estrangeira;</li>
                            <li>Contas bancárias (corrente, poupança, aplicação);</li>
                            <li>Veículos (motos, carros, embarcações);</li>
                            <li>Imóveis (terrenos, casas, apartamentos);</li>
                            <li>Participação em empresas;</li>
                            <li>Empréstimos a receber.</li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dependente-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Quem pode ser dependente?</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <p>Podem ser dependentes, para efeito do imposto sobre a renda:</p>
                        <ul>
                            <li>Companheiro(a) com quem o contribuinte tenha filho ou viva há mais de 5 anos, ou
                                cônjuge;
                            </li>
                            <li>Filho(a) ou enteado(a), até 21 anos de idade, ou, em qualquer idade, quando incapacitado
                                física ou mentalmente para o trabalho;
                            </li>
                            <li>Filho(a) ou enteado(a), se ainda estiverem cursando estabelecimento de ensino superior
                                ou escola técnica de segundo grau, até 24 anos de idade;
                            </li>
                            <li>Irmão(ã), neto(a) ou bisneto(a), sem arrimo dos pais, de quem o contribuinte detenha a
                                guarda judicial, até 21 anos, ou em qualquer idade, quando incapacitado física ou
                                mentalmente para o trabalho;
                            </li>
                            <li>Irmão(ã), neto(a) ou bisneto(a), sem arrimo dos pais, com idade de 21 anos até 24 anos,
                                se ainda estiver cursando estabelecimento de ensino superior ou escola técnica de
                                segundo grau, desde que o contribuinte tenha detido sua guarda judicial até os 21 anos;
                            </li>
                            <li>Pais, avós e bisavós que, em 2015, tenham recebido rendimentos, tributáveis ou não, até
                                R$ 22.499,13;
                            </li>
                            <li>Menor pobre até 21 anos que o contribuinte crie e eduque e de quem detenha a guarda
                                judicial;
                            </li>
                            <li>Pessoa absolutamente incapaz, da qual o contribuinte seja tutor ou curador.</li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="quem-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Quem é obrigado a declarar?</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <ul>
                            <li>As pessoas físicas residentes no Brasil que receberam rendimentos tributáveis superiores
                                a R$ 28.123,91 ano ano base;
                            </li>
                            <li>Os contribuintes que receberam rendimentos isentos, não-tributáveis ou tributados
                                exclusivamente na fonte, cuja soma tenha sido superior a R$ 40 mil no ano passado;
                            </li>
                            <li>Quem obteve ganho de capital na alienação de bens ou direitos, sujeito à incidência do
                                imposto, ou realizou operações em bolsas de valores, de mercadorias, de futuros e
                                assemelhadas;
                            </li>
                            <li>Quem tiver a posse ou a propriedade de bens ou direitos, inclusive terra nua, de valor
                                total superior a R$ 300 mil, também deve declarar IR neste ano;
                            </li>
                            <li>Contribuintes que passaram à condição de residente no Brasil, em qualquer mês do ano
                                passado;
                            </li>
                            <li>Quem optou pela isenção do imposto sobre a renda incidente sobre o ganho de capital
                                auferido na venda de imóveis residenciais, cujo produto da venda seja destinado à
                                aplicação na aquisição de imóveis residenciais localizados no país;
                            </li>
                            <li>Quem teve, no ano passado, receita bruta em valor superior a R$ 140.619,55 oriunda de
                                atividade rural.
                            </li>
                        </ul>
                        <p>
                            Como a Receita Federal ainda não atualizou os dados referentes a declaração de 2017, esses
                            dados informados anteriormente foram baseados na declaração do exercício anterior. Provável
                            que os valores passem por algumas alterações e quando isso ocorrer, iremos atualizar as
                            informações.
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="duvidas-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Dúvidas</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        Alo alo reggae do brasiu
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span>
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
