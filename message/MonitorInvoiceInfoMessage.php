<?php

namespace stp\spsr\message;

use stp\spsr\response\MonitoringInvoiceInfo;
use stp\spsr\type\EventType;
use stp\spsr\type\MonitoringInvoiceInfoType;
use stp\spsr\type\MonitoringType;
use SimpleXMLElement;

/**
 * @property string $Login
 * @property string $ICN
 * @property MonitoringType $Monitoring
 */
class MonitorInvoiceInfoMessage extends BaseXmlMessage
{
    public function getRoot()
    {
        return 'Monitoring';
    }

    public function getMethodString()
    {
        return 'Monitoring/MonInvoiceInfo';
    }

    public function getMethodVersion()
    {
        return '1.3';
    }

    protected function buildContentNode(SimpleXMLElement $xmlNode)
    {
        $this->ICN && $xmlNode->Login->addAttribute('ICN', $this->ICN);

        if (!$this->Monitoring) {
            throw new \RuntimeException('Monitoring attribute can\'t be empty');
        }

        $monitoring = $xmlNode->addChild('Monitoring');
        $monitoring->addAttribute('Language', $this->Monitoring->Language);

        foreach($this->Monitoring->Invoice as $invoice) {
            $this->xml_append($monitoring, $invoice->asXml($this->getXmlNs()));
        }
    }

    /**
     * @param \SimpleXMLElement $response
     *
     * @return MonitoringInvoiceInfo[]
     */
    public function buildResponse(SimpleXMLElement $response)
    {
        $result = [];

        if ($response->Invoices->Invoice instanceof \SimpleXMLElement) {
            foreach($response->Invoices->Invoice as $invoiceInfo) {
                /** @var MonitoringInvoiceInfo $invoice */
                $invoice = self::xmlNode2Type($invoiceInfo, MonitoringInvoiceInfo::className());

                if ($invoiceInfo->events->event instanceof \SimpleXMLElement) {
                    foreach($invoiceInfo->events->event as $event) {
                        $invoice->push('events', self::xmlNode2Type($event, EventType::className()));
                    }
                }

                $result[] = $invoice;
            }
        }

        // Error objects have non empty ErrorCode/ErrorMessage property
        if ($response->NotFound->Invoice instanceof \SimpleXMLElement) {
            foreach($response->NotFound->Invoice as $invoiceNotFound) {
                /** @var MonitoringInvoiceInfo $invoice */
                $invoice = self::xmlNode2Type($invoiceNotFound, MonitoringInvoiceInfo::className());

                $result[] = $invoice;
            }
        }

        return $result;
    }

    /**
     * Добавляет Invoice в запрос для поиска
     * Необходимо указать как минимум один параметр
     *
     * @param string|null $InvoiceNumber
     * @param string|null $GCInvoiceNumber
     * @param string|null $BarCode
     * @param string|null $GCBarCode
     * @param integer|null $Invoice_ID
     * @param integer|null $Invoice_Owner_ID
     * @return bool
     */
    public function addInvoice(
        $InvoiceNumber = null,
        $GCInvoiceNumber = null,
        $BarCode = null,
        $GCBarCode = null,
        $Invoice_ID = null,
        $Invoice_Owner_ID = null
    ) {
        if (!$InvoiceNumber && !$GCInvoiceNumber && !$BarCode && !$GCBarCode) {
            return false;
        }
        $invoice = new MonitoringInvoiceInfoType();

        $InvoiceNumber    && $invoice->InvoiceNumber = $InvoiceNumber;
        $GCInvoiceNumber  && $invoice->GCInvoiceNumber = $GCInvoiceNumber;
        $BarCode          && $invoice->BarCode = $BarCode;
        $GCBarCode        && $invoice->GCBarCode = $GCBarCode;
        $Invoice_ID       && $invoice->Invoice_ID = $Invoice_ID;
        $Invoice_Owner_ID && $invoice->Invoice_Owner_ID = $Invoice_Owner_ID;

        $this->push('Invoice', $invoice);

        return true;
    }
}
