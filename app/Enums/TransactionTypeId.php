<?php

namespace App\Enums;

enum TransactionTypeId: int
{
    case PURCHASE = 1;
    case SALE = 2;
    case REPAYMENT_OF_A_CREDIT_OR_LOAN = 3;
    case OBTAINING_A_CREDIT_OR_LOAN = 4;
    case PAYMENT_OF_FEES_AND_SERVICES = 5;
    case PROVISION_OF_SERVICES = 6;
    case PROVISION_OF_FINANCIAL_ASSISTANCE = 7;
    case RECEIVING_FINANCIAL_ASSISTANCE = 8;
    case TAX_PAYMENTS = 9;
}
