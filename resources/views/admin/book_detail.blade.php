<style>
    .transaction-details {
    padding: 20px;
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 10px;
}

.detail-heading {
    margin-bottom: 20px;
    font-size: 28px;
    color: #333;
    text-align: center;
}

.detail-item {
    margin-bottom: 15px;
}

.detail-label {
    font-weight: bold;
    font-size: 18px;
    color: #555;
}

.detail-value {
    margin-left: 10px;
    font-size: 18px;
    color: #777;
}

</style>

<div class="transaction-details">
    <h2 class="detail-heading">Book Details</h2>
    <div class="detail-item">
        <span class="detail-label">ID:</span>
        <span class="detail-value">{{ $transaction->id }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Username:</span>
        <span class="detail-value">{{ $transaction->user->name }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Service:</span>
        <span class="detail-value">{{ $transaction->service->name }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Hair Artist:</span>
        <span class="detail-value">{{ $transaction->kapster->name }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Schedule:</span>
        <span class="detail-value">{{ $transaction->schedule }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Total Price:</span>
        <span class="detail-value">IDR {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
    </div>
    <div class="detail-item">
        <span class="detail-label">Service Status:</span>
        <span class="detail-value">{{ $transaction->service_status }}</span>
    </div>
</div>
