import { Props } from '@tools/Props';
import Target from '@tools/Target';

/**
 * The tool to extract attribute values from tags.
 */
export default class Extractor {
    /**
     * Extracts key.
     *
     * @param element { Element }
     *   The DOM element.
     *
     * @return string
     */
    public static key(element: Element): string {
        const attribute = 'data-key';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const key = element.getAttribute(attribute);

        if (key === '') {
            return null;
        }

        return key;
    }

    /**
     * Extracts side.
     *
     * @param element { Element }
     *   The DOM element.
     *
     * @return string
     */
    public static side(element: Element): Props.side {
        const attribute = 'data-side';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const side = element.getAttribute(attribute);

        if (side === Props.side.LEFT || side === Props.side.RIGHT) {
            return side;
        }

        return null;
    }

    /**
     * Extracts action.
     *
     * @param element { Element }
     *   The DOM element.
     * @param _default { string }
     *   The value by default.
     *
     * @return string
     */
    public static action(element: Element, _default: Props.action = null): Props.action {
        const attribute = 'data-action';

        if (!element.hasAttribute(attribute)) {
            return _default;
        }

        const action: string = element.getAttribute(attribute);

        switch (action) {
            case Props.action.SHOW:
            case Props.action.HIDE:
                return action;
            default:
                return null;
        }
    }

    /**
     * Extracts target.
     *
     * @param element { Element }
     *   The DOM element.
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
