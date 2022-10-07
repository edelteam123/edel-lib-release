<?php

namespace com\apiconnect\Test\CsvTestSuite;

use com\apiconnect\Test\CsvTestSuite\helper;

class OrderPlacementCsvObj extends helper
{
    private $TestAction;

    private $Symbol;

    private $Exchange;

    private $BuySell;

    private $Validity;

    private $OrderType;

    private $Quantity;

    private $ExchangeCode;

    private $LimitPrice;

    private $DiscQty;

    private $TriggerPrice;

    private $ProductCode;

    private $dtDays;

    private $Nest_Order_ID;

    private $fromDate;

    private $toDate;

    private $Syom_Id;

    private $Status;

    private $Target;

    private $StopLoss;

    private $Trailing_Stop_Loss;

    private $Trailing_Stop_Loss_Value;

    private $Fill_Id;

    private $New_Product_Code;

    private $Old_Product_Code;

    private $MF_Token;

    private $MF_ISIN_Code;

    private $MF_Transaction_Type;

    private $MF_Client_Code;

    private $MF_Quantity;

    private $MF_Amount;

    private $MF_ReInv_Flag;

    private $MF_Folio_Number;

    private $MF_Scheme_Name;

    private $MF_Start_Date;

    private $MF_End_Date;

    private $MF_SIP_Frequency;

    private $MF_Generate_First_Order_Today;

    private $MF_Scheme_Plan;

    private $MF_Scheme_Code;

    private $MF_Transaction_Id;

    private $MF_Mandate_Id;

    private $TestStatus;

    private $TestOutput;

    private $Active;

    private $Symbols;

    private $Event;

    private $Charts_AssetType;

    private $Charts_Interval;

    private $Charts_TillDate;

    private $Charts_IncludeContinuousFuture;

    private $Order_ID;
    
    private $News_Category;

    private $News_Holdings;

    private $News_SearchText;

    private $News_PageNum;

    private $ResearchCalls_Segment;

    private $ResearchCalls_Term;

    private $ResearchCalls_MarketCap;

    private $ResearchCalls_RecommendationType;

    private $Watchlist_GroupName;

    private $Watchlist_Symbols;

    private $Watchlist_NewGroupName;

    public function getTestAction()
    {
        return $this->TestAction;
    }

    public function setTestAction($testAction)
    {
        $this->TestAction = $testAction;
    }

    public function getSymbol()
    {
        return $this->Symbol;
    }

    public function setSymbol($symbol)
    {
        $this->Symbol = $symbol;
    }

    public function getExchange()
    {
        return $this->Exchange;
    }

    public function setExchange($exchange)
    {
        $this->Exchange = $exchange;
    }

    public function getBuySell()
    {
        return $this->BuySell;
    }

    public function setBuySell($buySell)
    {
        $this->BuySell = $buySell;
    }

    public function getValidity()
    {
        return $this->Validity;
    }

    public function setValidity($validity)
    {
        $this->Validity = $validity;
    }

    public function getOrderType()
    {
        return $this->OrderType;
    }

    public function setOrderType($orderType)
    {
        $this->OrderType = $orderType;
    }

    public function getQuantity()
    {
        return $this->Quantity;
    }

    public function setQuantity($quantity)
    {
        $this->Quantity = $quantity;
    }

    public function getExchangeCode()
    {
        return $this->ExchangeCode;
    }

    public function setExchangeCode($exchangeCode)
    {
        $this->ExchangeCode = $exchangeCode;
    }

    public function getLimitPrice()
    {
        return $this->LimitPrice;
    }

    public function setLimitPrice($limitPrice)
    {
        $this->LimitPrice = $limitPrice;
    }

    public function getDiscQty()
    {
        return $this->DiscQty;
    }

    public function setDiscQty($discQty)
    {
        $this->DiscQty = $discQty;
    }

    public function getTriggerPrice()
    {
        return $this->TriggerPrice;
    }

    public function setTriggerPrice($triggerPrice)
    {
        $this->TriggerPrice = $triggerPrice;
    }

    public function getProductCode()
    {
        return $this->ProductCode;
    }

    public function setProductCode($productCode)
    {
        $this->ProductCode = $productCode;
    }

    public function getDtDays()
    {
        return $this->dtDays;
    }

    public function setDtDays($dtDays)
    {
        $this->dtDays = $dtDays;
    }

    public function getNest_Order_ID()
    {
        return $this->Nest_Order_ID;
    }

    public function setNest_Order_ID($nest_Order_ID)
    {
        $this->Nest_Order_ID = $nest_Order_ID;
    }

    public function getFromDate()
    {
        return $this->fromDate;
    }

    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    public function getToDate()
    {
        return $this->toDate;
    }

    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    public function getSyom_Id()
    {
        return $this->Syom_Id;
    }

    public function setSyom_Id($syom_Id)
    {
        $this->Syom_Id = $syom_Id;
    }

    public function getStatus()
    {
        return $this->Status;
    }

    public function setStatus($status)
    {
        $this->Status = $status;
    }

    public function getTarget()
    {
        return $this->Target;
    }

    public function setTarget($target)
    {
        $this->Target = $target;
    }

    public function getStopLoss()
    {
        return $this->StopLoss;
    }

    public function setStopLoss($stopLoss)
    {
        $this->StopLoss = $stopLoss;
    }

    public function getTrailing_Stop_Loss()
    {
        return $this->Trailing_Stop_Loss;
    }

    public function setTrailing_Stop_Loss($trailing_Stop_Loss)
    {
        $this->Trailing_Stop_Loss = $trailing_Stop_Loss;
    }

    public function getTrailing_Stop_Loss_Value()
    {
        return $this->Trailing_Stop_Loss_Value;
    }

    public function setTrailing_Stop_Loss_Value($trailing_Stop_Loss_Value)
    {
        $this->Trailing_Stop_Loss_Value = $trailing_Stop_Loss_Value;
    }

    public function getFill_Id()
    {
        return $this->Fill_Id;
    }

    public function setFill_Id($fill_Id)
    {
        $this->Fill_Id = $fill_Id;
    }

    public function getNew_Product_Code()
    {
        return $this->New_Product_Code;
    }

    public function setNew_Product_Code($new_Product_Code)
    {
        $this->New_Product_Code = $new_Product_Code;
    }

    public function getOld_Product_Code()
    {
        return $this->Old_Product_Code;
    }

    public function setOld_Product_Code($old_Product_Code)
    {
        $this->Old_Product_Code = $old_Product_Code;
    }

    public function getMF_Token()
    {
        return $this->MF_Token;
    }

    public function setMF_Token($mF_Token)
    {
        $this->MF_Token = $mF_Token;
    }

    public function getMF_ISIN_Code()
    {
        return $this->MF_ISIN_Code;
    }

    public function setMF_ISIN_Code($mF_ISIN_Code)
    {
        $this->MF_ISIN_Code = $mF_ISIN_Code;
    }

    public function getMF_Transaction_Type()
    {
        return $this->MF_Transaction_Type;
    }

    public function setMF_Transaction_Type($mF_Transaction_Type)
    {
        $this->MF_Transaction_Type = $mF_Transaction_Type;
    }

    public function getMF_Client_Code()
    {
        return $this->MF_Client_Code;
    }

    public function setMF_Client_Code($mF_Client_Code)
    {
        $this->MF_Client_Code = $mF_Client_Code;
    }

    public function getMF_Quantity()
    {
        return $this->MF_Quantity;
    }

    public function setMF_Quantity($mF_Quantity)
    {
        $this->MF_Quantity = $mF_Quantity;
    }

    public function getMF_Amount()
    {
        return $this->MF_Amount;
    }

    public function setMF_Amount($mF_Amount)
    {
        $this->MF_Amount = $mF_Amount;
    }

    public function getMF_ReInv_Flag()
    {
        return $this->MF_ReInv_Flag;
    }

    public function setMF_ReInv_Flag($mF_ReInv_Flag)
    {
        $this->MF_ReInv_Flag = $mF_ReInv_Flag;
    }

    public function getMF_Folio_Number()
    {
        return $this->MF_Folio_Number;
    }

    public function setMF_Folio_Number($mF_Folio_Number)
    {
        $this->MF_Folio_Number = $mF_Folio_Number;
    }

    public function getMF_Scheme_Name()
    {
        return $this->MF_Scheme_Name;
    }

    public function setMF_Scheme_Name($mF_Scheme_Name)
    {
        $this->MF_Scheme_Name = $mF_Scheme_Name;
    }

    public function getMF_Start_Date()
    {
        return $this->MF_Start_Date;
    }

    public function setMF_Start_Date($mF_Start_Date)
    {
        $this->MF_Start_Date = $mF_Start_Date;
    }

    public function getMF_End_Date()
    {
        return $this->MF_End_Date;
    }

    public function setMF_End_Date($mF_End_Date)
    {
        $this->MF_End_Date = $mF_End_Date;
    }

    public function getMF_SIP_Frequency()
    {
        return $this->MF_SIP_Frequency;
    }

    public function setMF_SIP_Frequency($mF_SIP_Frequency)
    {
        $this->MF_SIP_Frequency = $mF_SIP_Frequency;
    }

    public function getMF_Generate_First_Order_Today()
    {
        return $this->MF_Generate_First_Order_Today;
    }

    public function setMF_Generate_First_Order_Today($mF_Generate_First_Order_Today)
    {
        $this->MF_Generate_First_Order_Today = $mF_Generate_First_Order_Today;
    }

    public function getMF_Scheme_Plan()
    {
        return $this->MF_Scheme_Plan;
    }

    public function setMF_Scheme_Plan($mF_Scheme_Plan)
    {
        $this->MF_Scheme_Plan = $mF_Scheme_Plan;
    }

    public function getMF_Scheme_Code()
    {
        return $this->MF_Scheme_Code;
    }

    public function setMF_Scheme_Code($mF_Scheme_Code)
    {
        $this->MF_Scheme_Code = $mF_Scheme_Code;
    }

    public function getMF_Transaction_Id()
    {
        return $this->MF_Transaction_Id;
    }

    public function setMF_Transaction_Id($mF_Transaction_Id)
    {
        $this->MF_Transaction_Id = $mF_Transaction_Id;
    }

    public function getTestStatus()
    {
        return $this->TestStatus;
    }

    public function setTestStatus($TestStatus)
    {
        $this->TestStatus = $TestStatus;
    }

    public function getTestOutput()
    {
        return $this->TestOutput;
    }

    public function setTestOutput($TestOutput)
    {
        $this->TestOutput = $TestOutput;
    }

    public function getActive()
    {
        return $this->Active;
    }

    public function setActive($active)
    {
        $this->Active = $active;
    }

    public function getSymbols()
    {
        return $this->Symbols;
    }

    public function setSymbols($symbols)
    {
        $this->Symbols = $symbols;
    }

    public function getEvent()
    {
        return $this->Event;
    }

    public function setEvent($event)
    {
        $this->Event = $event;
    }

    public function getCharts_AssetType()
    {
        return $this->Charts_AssetType;
    }

    public function setCharts_AssetType($assetType)
    {
        $this->Charts_AssetType = $assetType;
    }

    public function getCharts_Interval()
    {
        return $this->Charts_Interval;
    }

    public function setCharts_Interval($interval)
    {
        $this->Charts_Interval = $interval;
    }

    public function getCharts_IncludeContinuousFuture()
    {
        return $this->Charts_IncludeContinuousFuture;
    }

    public function setCharts_IncludeContinuousFuture($includeContinuousFuture)
    {
        $this->Charts_IncludeContinuousFuture = $includeContinuousFuture;
    }

    public function getNews_Category()
    {
        return $this->News_Category;
    }

    public function setNews_Category($newsCategory)
    {
        $this->News_Category = $newsCategory;
    }

    public function getNews_Holdings()
    {
        return $this->News_Holdings;
    }

    public function setNews_Holdings($holdings)
    {
        $this->News_Holdings = $holdings;
    }

    public function getNews_SearchText()
    {
        return $this->News_SearchText;
    }

    public function setNews_SearchText($newsSearchText)
    {
        $this->News_SearchText = $newsSearchText;
    }

    public function getNews_PageNum()
    {
        return $this->News_PageNum;
    }

    public function setNews_PageNum($newsPgNum)
    {
        $this->News_PageNum = $newsPgNum;
    }

    public function getMF_Mandate_Id()
    {
        return $this->MF_Mandate_Id;
    }

    public function setMF_Mandate_Id($mF_Mandate_Id)
    {
        $this->MF_Mandate_Id = $mF_Mandate_Id;
    }

    public function getOrder_ID()
    {
        return $this->Order_ID;
    }

    public function setOrder_ID($orderId)
    {
        $this->Order_ID = $orderId;
    }

    public function getCharts_TillDate()
    {
        return $this->Charts_TillDate;
    }

    public function setCharts_TillDate($chartsTillDate)
    {
        $this->Charts_TillDate = $chartsTillDate;
    }

    public function getResearchCalls_Segment()
    {
        return $this->ResearchCalls_Segment;
    }

    public function setResearchCalls_Segment($researchCallsSegment)
    {
        $this->ResearchCalls_Segment = $researchCallsSegment;
    }

    public function getResearchCalls_Term()
    {
        return $this->ResearchCalls_Term;
    }

    public function setResearchCalls_Term($researchCallsTerm)
    {
        $this->ResearchCalls_Term = $researchCallsTerm;
    }

    public function getResearchCalls_MarketCap()
    {
        return $this->ResearchCalls_MarketCap;
    }

    public function setResearchCalls_MarketCap($researchCallsMarketCap)
    {
        $this->ResearchCalls_MarketCap = $researchCallsMarketCap;
    }

    public function getResearchCalls_RecommendationType()
    {
        return $this->ResearchCalls_RecommendationType;
    }

    public function setResearchCalls_RecommendationType($researchCallsRecommendationType)
    {
        $this->ResearchCalls_RecommendationType = $researchCallsRecommendationType;
    }
    public function getWatchlist_GroupName()
    {
        return $this->Watchlist_GroupName;
    }

    public function setWatchlist_GroupName($watchlistGroupName)
    {
        $this->Watchlist_GroupName = $watchlistGroupName;
    }

    public function getWatchlist_Symbols()
    {
        return $this->Watchlist_Symbols;
    }

    public function setWatchlist_Symbols($watchlistSymbols)
    {
        $this->Watchlist_Symbols = $watchlistSymbols;
    }

    public function getWatchlist_NewGroupName()
    {
        return $this->Watchlist_NewGroupName;
    }

    public function setWatchlist_NewGroupName($watchlistNewGroupName)
    {
        $this->Watchlist_NewGroupName = $watchlistNewGroupName;
    }
}
