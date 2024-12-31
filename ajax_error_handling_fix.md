## AJAX Error Handling Fix

Updated error handling to properly support AJAX responses:

1. Previous issues:
   - Throwing exceptions caused generic error messages in AJAX response
   - Multiple environment variable loads could cause conflicts
   - Error responses weren't properly formatted for AJAX

2. Changes made:
   - Removed duplicate environment loading
   - Don't throw exceptions for email failures
   - Return proper JSON error responses
   - Keep database save success status
   - Include detailed error message in response

3. Error response format:
```json
{
    "status": "error",
    "message": "User-friendly message",
    "error": "Detailed error message for debugging"
}
```

This ensures that:
1. Client gets proper error feedback
2. Successful database saves are acknowledged
3. Error information is available for debugging
4. Environment variables are loaded only once