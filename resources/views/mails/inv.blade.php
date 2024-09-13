<!DOCTYPE html>
<html>

    <head>
        <style>
            /* Add any additional styles if needed here */
        </style>
    </head>

    <body style="margin: 0; padding: 0; background-color: #f3f4f6;">

        <table width="100%" cellpadding="0" cellspacing="0" border="0"
            style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f3f4f6; padding: 16px;">
            <tr>
                <td align="center"
                    style="width: 100%; max-width: 768px; min-width: 640px; padding: 32px; background-color: #ffffff; border: 1px solid #e5e7eb; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td style="width: 50%; vertical-align: top;">
                                <h3 style="font-weight: bold; margin-bottom: 16px;">Invoice: <span
                                        style="color: #f97316;"> {{ $invoice->code }}</span></h3>
                                <h3 style="font-weight: semibold; color: #374151; margin-bottom: 8px;">Bill to</h3>
                                <p style="color: #4b5563;">{{ $customer->name }}</p>
                                <p style="color: #4b5563; max-width: 256px;">{{ $customer->address }}</p>
                                <p style="color: #4b5563;">{{ $customer->phone }}</p>
                            </td>
                            <td style="width: 50%; text-align: right; vertical-align: top;">
                                <p style="color: #4b5563;">Full-stack Invoice</p>
                                <p style="color: #4b5563;">291 N 4th St, San Jose, CA 95112, USA</p>
                            </td>
                        </tr>
                    </table>

                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                        style="margin-bottom: 32px; overflow-x: auto;">
                        <thead>
                            <tr style="background-color: #f3f4f6; color: #374151; border-bottom: 1px solid #e5e7eb;">
                                <th
                                    style="padding: 12px 16px; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                    Item</th>
                                <th
                                    style="padding: 12px 16px; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                    Price</th>
                                <th
                                    style="padding: 12px 16px; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                    Qty</th>
                                <th
                                    style="padding: 12px 16px; text-align: right; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody style="color: #374151;">
                            @foreach ($items as $item)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="padding: 12px 16px;">{{ $item->product->name }}</td>
                                <td style="padding: 12px 16px; text-align: right;">{{ $item->product->price }}</td>
                                <td style="padding: 12px 16px; text-align: right;">{{ $item->quantity }}</td>
                                <td style="padding: 12px 16px; text-align: right;">{{ $item->unit_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                        style="border-top: 1px solid #e5e7eb; padding-top: 16px; color: #374151; text-align: right;">
                        <tr>
                            <td>
                                <p style="margin-bottom: 4px;">Subtotal: {{ $invoice->total }}</p>
                                <p style="margin-bottom: 4px;">Discount: 00</p>
                                <p style="font-weight: 600;">Total: {{ $invoice->total }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </body>

</html>