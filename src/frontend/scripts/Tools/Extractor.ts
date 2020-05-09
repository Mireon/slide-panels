import { C } from '@entities/C';
import Target from '@entities/Target';

/**
 * ...
 */
class Extractor {
    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return string
     */
    public static id(element: Element): string {
        const attribute = 'data-id';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const id = element.getAttribute(attribute);

        if (id === '') {
            return null;
        }

        return id;
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return string
     */
    public static side(element: Element): C.side {
        const attribute = 'data-side';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const side = element.getAttribute(attribute);

        if (side === C.side.LEFT || side === C.side.RIGHT) {
            return side;
        }

        return null;
    }

    /**
     * ...
     *
     * @param element { Element }
     *   ...
     * @param _default { string }
     *   ...
     *
     * @return string
     */
    public static action(element: Element, _default: C.action = null): C.action {
        const attribute = 'data-action';

        if (!element.hasAttribute(attribute)) {
            return _default;
        }

        const action: string = element.getAttribute(attribute);

        if (action === C.action.SHOW || action === C.action.HIDE) {
            return action;
        }

        return null;
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return Target
     */
    public static target(element: Element): Target {
        const attribute = 'data-target';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const target: string = element.getAttribute(attribute);

        if (target === '') {
            return null;
        }

        return new Target(target);
    }
}

export default Extractor;
