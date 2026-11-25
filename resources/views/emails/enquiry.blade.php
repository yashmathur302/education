<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $heading }}</title>
</head>
<body style="margin:0;padding:24px;background:#f3efe8;font-family:Arial,Helvetica,sans-serif;color:#12343c;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;background:#ffffff;border-radius:8px;">
        <tr>
            <td style="padding:24px 28px 8px;">
                <h1 style="margin:0;font-size:20px;">{{ $heading }}</h1>
                <p style="margin:8px 0 0;font-size:14px;color:#4a6067;">
                    Submitted on {{ now()->format('j F Y, g:i a') }} through the {{ $pageName }} page. Reply to this email to answer the sender directly.
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding:16px 28px 28px;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px;">
                    @foreach ($details as $label => $value)
                        <tr>
                            <td style="padding:10px 12px 10px 0;border-bottom:1px solid #eee;font-weight:bold;width:40%;vertical-align:top;">{{ $label }}</td>
                            <td style="padding:10px 0;border-bottom:1px solid #eee;vertical-align:top;white-space:pre-line;">{{ $value }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
