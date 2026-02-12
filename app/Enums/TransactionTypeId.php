<?php

namespace App\Enums;

enum TransactionTypeId: int
{
    case PURCHASE = 1;
    case SALE = 2;
    case LOAN_PROVISION = 3;
    case RECEIPT_OF_FUNDS_FROM_BORROWER = 4;
    case GETTING_CREDIT = 5;
    case CREDIT_REPAYMENT = 6;
    case PAYMENT_OF_FEES_AND_SERVICES = 7;
    case PROVISION_OF_SERVICES = 8;
    case PROVISION_OF_FINANCIAL_ASSISTANCE = 9;
    case RECEIVING_FINANCIAL_ASSISTANCE = 10;
    case TAX_PAYMENTS = 11;
    case PAYMENT_FOR_RAW_MATERIALS = 12;
}
