import { C } from '@entities/C';
import Target from '@entities/Target';

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
     * Extracts action.
     *
     * @param element { Element }
     *   The DOM element.
     * @param _default { string }
     *   The value by default.
     *
     * @return string
     */
    public static action(element: Element, _default: C.action = null): C.action {
        const attribute = 'data-action';

        if (!element.hasAttribute(attribute)) {
            return _default;
        }

        const action: string = element.getAttribute(attribute);

        switch (action) {
            case C.action.SHOW:
            case C.action.HIDE:
            case C.action.BACK:
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
     * @param action { C.action }
     *   The action.
     *
     * @return Target
     */
    public static target(element: Element, action: C.action): Target {
        if (action === C.action.SHOW) {
            return Extractor.targetFromAttribute(element);
        }

        if (action === C.action.BACK) {
            const target = Extractor.targetFromParents(element);

            if (target !== null && target.hasLayers()) {
                return target;
            } else {
                element.remove();
            }
        }

        return null;
    }

    /**
     * Extracts target from attribute of selected element.
     *
     * @param element { Element }
     *   The DOM element.
     *
     * @return Target
     */
    public static targetFromAttribute(element: Element): Target {
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

    /**
     * Extracts target from attribute of parent elements.
     *
     * @param element { Element }
     *   The DOM element.
     *
     * @return Target
     */
    public static targetFromParents(element: Element): Target {
        const panel = element.closest('[data-element="panel"]');
        const layer = element.closest('[data-element="layer"]');
        const target = [];

        if (!panel) {
            return null;
        }

        target.push(Extractor.key(panel));

        if (layer) {
            target.push(...Extractor.key(layer).split('.').slice(0, -1));
        }

        return new Target(target.join('.'));
    }
}
