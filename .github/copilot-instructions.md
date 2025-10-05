# Copilot Instructions for Caipiao

## Project Overview

This is a lottery/betting platform built with ThinkPHP framework. The application includes admin panel, agent system, and user-facing interfaces for various lottery games.

## Technology Stack

- **Backend Framework**: ThinkPHP 3.x (PHP)
- **PHP Version**: Requires PHP >= 5.3.0
- **Frontend**: HTML, JavaScript, CSS, Cocos2D-JS
- **WebSocket**: Workerman with socket.io integration
- **Database**: MySQL (implied from ThinkPHP)

## Project Structure

```
/Application/          - Main application code
  /Admin/             - Admin panel module
  /Agent/             - Agent system module
  /Home/              - User-facing module
  /Common/            - Shared code, APIs, and configurations
/Public/              - Public assets (CSS, JS, images)
/Template/            - HTML templates for different modules
/ThinkPHP/            - ThinkPHP framework files
/Workerman/           - WebSocket server implementation
/Runtime/             - Cache and runtime files (not versioned)
/Uploads/             - User uploaded files
```

## Coding Standards

### PHP Code
- Follow ThinkPHP conventions and naming patterns
- Controllers should extend base controllers
- Model classes should be suffixed with `Model`
- API classes should be suffixed with `Api`
- Use camelCase for method names
- Use PascalCase for class names

### File Organization
- Controllers go in `/Application/{Module}/Controller/`
- Models go in `/Application/{Module}/Model/`
- Configuration files go in `/Application/{Module}/Conf/`
- Templates go in `/Template/{Module}/`

### Database
- Use ThinkPHP's Model methods for database operations
- Avoid raw SQL when possible
- Use parameterized queries for security

## Security Considerations

⚠️ **Important Security Notes:**
- This is a gambling/lottery application - be extra careful with financial calculations
- Always validate and sanitize user input
- Use prepared statements for database queries
- Implement proper authentication and authorization checks
- Never expose sensitive configuration in public files
- Protect against SQL injection, XSS, and CSRF attacks

## Development Workflow

### Running the Application
1. Ensure PHP >= 5.3.0 is installed
2. Configure database in `/Application/Common/Conf/config.php`
3. Set appropriate permissions for `/Runtime/` and `/Uploads/` directories
4. Access via `index.php` as the entry point

### Debug Mode
- `APP_DEBUG` is defined in `index.php`
- Set to `true` for development, `false` for production

### Working with WebSocket
- WebSocket server code is in `/Workerman/` directory
- Start with `php start_io.php start`
- Socket.io integration for real-time features

## Common Patterns

### Controllers
```php
namespace Admin\Controller;
use Think\Controller;

class ExampleController extends Controller {
    public function index() {
        // Controller logic
    }
}
```

### Models
```php
namespace Common\Model;
use Think\Model;

class ExampleModel extends Model {
    // Model logic
}
```

### Templates
- Use ThinkPHP template syntax: `{$variable}`, `{:U('Module/Controller/action')}`
- Keep template logic minimal

## Testing
- No automated test infrastructure is currently in place
- Manual testing required for changes
- Test across Admin, Agent, and Home modules when making common changes

## What NOT to Do

- ❌ Do not modify ThinkPHP core files in `/ThinkPHP/`
- ❌ Do not commit `/Runtime/` cache files
- ❌ Do not commit sensitive configuration data
- ❌ Do not break backward compatibility without careful consideration
- ❌ Do not add unnecessary dependencies

## Key Considerations

1. **Multi-module Architecture**: Changes in Common module affect all other modules
2. **Real-time Features**: Many features rely on WebSocket connections
3. **Internationalization**: Interface appears to be in Chinese - maintain consistency
4. **Financial Accuracy**: Double-check any calculations involving money or points
5. **Performance**: Consider caching for frequently accessed data

## Useful Commands

```bash
# Clear runtime cache
rm -rf /Runtime/Cache/*

# Start WebSocket server
php start_io.php start

# Stop WebSocket server
php start_io.php stop
```

## Additional Resources

- ThinkPHP 3.2 Documentation: http://document.thinkphp.cn/manual_3_2.html
- Workerman Documentation: http://www.workerman.net/

---

When making changes:
1. Understand the impact across all modules (Admin, Agent, Home)
2. Test financial calculations thoroughly
3. Maintain existing code style and patterns
4. Consider security implications
5. Update relevant configuration if needed
