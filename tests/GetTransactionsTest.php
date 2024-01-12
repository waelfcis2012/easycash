<?php

namespace Tests;

use Illuminate\Http\Response;

class GetTransactionsTest extends TestCase
{
    public function test_get_page_1()
    {
        $this->get('/api/v1/transactaions');
        $this->assertOnSuccess();
        $this->assertPagination($this->response->getData()->result);
        $this->assertOnData($this->response->getData()->result->data);
    }

    public function test_get_page_2()
    {
        $this->get('/api/v1/transactaions?page=2');
        $this->assertOnSuccess();
        $this->assertPagination($this->response->getData()->result, 2);
        $this->assertOnData($this->response->getData()->result->data);
    }

    public function test_filter_by_provider()
    {
        $this->get('/api/v1/transactaions?provider=DataProviderW');
        $this->assertOnSuccess();
        $this->assertPagination($this->response->getData()->result);
        $data = $this->response->getData()->result->data;
        $this->assertOnData($data);
        $this->assertOnField($data, "provider", "W");
    }

    public function test_filter_by_currency()
    {
        $this->get('/api/v1/transactaions?currency=USD');
        $this->assertOnSuccess();
        $this->assertPagination($this->response->getData()->result);
        $data = $this->response->getData()->result->data;
        $this->assertOnData($data);
        $this->assertOnField($data, "currency", "USD");
    }

    public function test_filter_by_status()
    {
        $this->get('/api/v1/transactaions?status=paid');
        $this->assertOnSuccess();
        $this->assertPagination($this->response->getData()->result);
        $data = $this->response->getData()->result->data;
        $this->assertOnData($data);
        $this->assertOnField($data, "status", 1);
    }

    public function test_filter_by_amount()
    {
        $this->get('/api/v1/transactaions?amounteMin=10&amounteMax=100');
        $this->assertOnSuccess();
        $this->assertPagination($this->response->getData()->result);
        $data = $this->response->getData()->result->data;
        $this->assertOnData($data);
        $max  = max(array_column($data, "amount"));
        $min = min(array_column($data, "amount"));
        $this->assertTrue($max <= 100);
        $this->assertTrue($min >= 10);
    }

    private function assertOnSuccess() {
        $this->response->assertStatus(Response::HTTP_OK);
        $this->assertEquals($this->response->getData()->status, 1);
    }

    private function assertPagination($data, $page = 1) {
        $limit = config("transactions.per-page");
        $this->assertEquals($data->current_page, $page);
        $this->assertEquals($data->from, ($page - 1) * $limit + 1);
        $this->assertEquals($data->to, $page * $limit);
        $this->assertEquals($data->per_page, $limit);
        $this->assertCount($data->per_page, $data->data);
    }

    private function assertOnData($data) {
        if (count($data) > 0) {
            $transaction = $data[0];
            $this->assertIsNumeric($transaction->id);
            $this->assertIsString($transaction->currency);
            $this->assertIsString($transaction->phone);
            $this->assertIsString($transaction->transaction_id);
            $this->assertIsNumeric($transaction->amount);
            $this->assertIsNumeric($transaction->status);
        }
    }
    
    private function assertOnField($data, $field, $value) {
        $provider = array_unique(array_column($data, $field))[0];
        $this->assertEquals($provider, $value);
    }
}
