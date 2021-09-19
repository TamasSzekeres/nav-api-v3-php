<?php

namespace LightSideSoftware\NavApi\V3\Types\Requests;

/**
 * A POST /manageAnnulment REST operáció kérés típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class ManageAnnulmentRequest extends BasicOnlineInvoiceRequestType
{
    /**
     * @var string A tranzakcióhoz kiadott egyedi és dekódolt token.
     */
    public $exchangeToken;

    /**
     * @var AnnulmentOperationListType A kéréshez tartozó kötegelt technikai érvénytelenítések
     */
    public $annulmentOperations;
}
